<?php

namespace App\Http\Livewire;

use App\Events\GameUpdated;

use App\Game;
use App\Player;
use App\Board;
use App\Category;
use App\Question;
use Livewire\Component;
use Illuminate\Http\Request;

class GameBoard extends Component
{

	public $gid = null;

	protected function getListeners(){
		return $listeners = [
			'echo:game.' . $this->gid . ',GameUpdated' => '$refresh'
		];
	}

	// ============ LIVEWIRE LIFECYCLE METHODS ==========

	public function mount(Request $request){
		$this->gid = $request->gameId;
	}

    public function render()
    {
    	$game = Game::find($this->gid);
    	$round = $game->round;
    	$players = Player::with('user')->where('game_id', $this->gid)->get()->sortBy('order');
    	$board = Board::where(['game_id' => $this->gid, 'round' => $round])->get()->last();
    	$boardId = $board->id;
    	$categories = Category::with('questions')->where('board_id', $boardId)->get();

        return view('livewire.game', [
        	'game' => $game,
        	'players' => $players,
        	'board' => $board,
        	'categories' => $categories
        ]);
    }

	
	//============ CLICK HANDLERS ============
	
	public function handleAnswerCorrectClick($uid){

		// find game and make sure user is host
		$game = Game::with('players')->where('id', $this->gid)->get()->first();
		if($game->host != $uid) return;

		// get question and put its answer in the game active text
		$question = Question::find($game->active_question);
		$game->active_text = $question->answer;
		$game->answer_active = true;
		$game->save();

		// add score to player answering correctly
		$currentPlayerGuess = $game->player_guess;
		foreach($game->players as $player){
			if($player->user_id == $currentPlayerGuess){
				$player->score = $player->score + ($game->round * $question->order * 200);
				$player->save();
				break;
			}
		}

		// broadcast data
		broadcast(new GameUpdated(['gid' => $this->gid ])); 
	}

	public function handleAnswerWrongClick($uid){

		// find game and make sure user is host
		$game = Game::with('players')->where('id', $this->gid)->get()->first();
		if($game->host != $uid) return;

		// find whose turn it is and pass to next player or show answer if back to beginning
		$currentPlayerGuess = $game->player_guess;
		$players = $game->players->sortBy('order');
		$currentPlayer = null;
		foreach($players as $player){
			if($player->user_id == $currentPlayerGuess){
				$currentPlayer = $player;
				break;
			}
		}
		$currentPlayerOrder = $currentPlayer->order;

		if($currentPlayerOrder == count($players)) $currentPlayerOrder = 1;
			else $currentPlayerOrder ++;

		foreach($players as $player){
			if($player->order == $currentPlayerOrder){
				// it's back to the beginning so show answer
				if($player->id == $game->player_turn){
					dd('ok');
					$question = Question::find($game->active_question);
					$game->active_text = $question->answer;
					$game->answer_active = true;
				}
					else $game->player_guess = $player->user_id;
				$game->save();
				break;
			}
		}

		// broadcast data 
		broadcast(new GameUpdated(['gid' => $this->gid ])); 
	}
	
	public function handleClueClick($qid, $uid){

		// find game and make sure user is player's turn or host
		$game = Game::find($this->gid);
		if($game->player_turn != $uid && $game->host != $uid) return;

		// get the question's clue and set game state
		$question = Question::find($qid); // maybe todo: authenticate that question belongs to game?
		$game->active_question = $question->id;
		$game->active_text = $question->clue;
		$game->clue_active = true;
		$game->save();

		// mark question as selected
		$question->selected = true;
		$question->save();

		// broadcast data
		broadcast(new GameUpdated([ 'gid' => $this->gid ]));
		
	}

	public function handleContinueClick($uid){
		
		// find game and make sure user is player's turn or host
		$game = Game::find($this->gid);
		if($game->host != $uid) return;

		// reset board
		$game->clue_active = false;
		$game->answer_active = false;
		$game->active_text = null;
		$game->active_question = null;

		// pass turn and save game
		$currentPlayerTurn = $game->player_turn;
		$players = $game->players->sortBy('order');
		$currentPlayer = null;
		foreach($players as $player){
			if($player->user_id == $currentPlayerTurn){
				$currentPlayer = $player;
				break;
			}
		}
		$currentPlayerOrder = $currentPlayer->order;
		if($currentPlayerOrder == count($players)) $currentPlayerOrder = 1;
			else $currentPlayerOrder ++;
		foreach($players as $player){
			if($player->order == $currentPlayerOrder){
				$game->player_turn = $player->user_id;
				$game->player_guess = $player->user_id;
				$game->save();
				break;
			}
		}

		// broadcast data
		broadcast(new GameUpdated(['gid' => $this->gid ])); 
	}


	
	public function nextRound(){

		$this->resetClueState();
		$game = Game::find($this->gid);
		
		if($game->round == 2) $this->showFinalCategory();
		if($game->round == 3) return;
		
		$game->round ++;
		$game->save();

		//broadcast(new GameUpdated('nextRound'));
	}

	public function questionCorrect(){
		$this->questionCorrect = true;
		$this->showAnswer();
	}

	public function questionWrong(){
		$this->updatePlayerGuess();
		// todo: don't switch guess/turn if last guesser, that will be taken care of in show answer
	}

	public function questionAllWrong(){
		$this->showAnswer();
	}

	public function questionContinue(){

		$this->updateQuestionAsSelected();

		$game = Game::find($this->gid);

		if($this->questionCorrect){
			$player = Player::find($game->player_guess);
			$player->score += $this->clueActiveAmount;
			$player->save();
		}

		$this->resetClueState();

		// see if need to rollover - this only works for now because pid's are 1-4
		$playerCount = count($game->players);
		if($playerCount ==  $game->player_turn) $nextPlayerTurn = 1;
		else $nextPlayerTurn = $game->player_turn + 1;

		$game->player_guess = $nextPlayerTurn;
		$game->player_turn = $nextPlayerTurn;
		$game->save();
		
	}

	public function resetClueState(){
		$this->clueActive = false;
		$this->clueActiveAnswer = false;
		$this->clueActiveQuestion = null;
		$this->clueText = null;
		$this->questionCorrect = false;
	}

	// public function showAnswer(){
	// 	$this->clueText = $this->clueActiveQuestion->answer;
	// 	$this->clueActiveAnswer = true;
	// }

	// public function showClue($qid, $amount){
	// 	$this->clueActive = true;
	// 	$this->clueActiveAmount = $amount;

	// 	//event(new ClueSelected($this->gid));

	// 	$question = Question::find($qid);
	// 	$this->clueActiveQuestion = $question;
	// 	$this->clueText = $question->clue;
	// }

	public function showFinalCategory(){
		$boards = Board::with('categories')->where(['game_id' => $this->gid, 'round' => 3])->get();
		$this->clueActive = true;
		$this->clueActiveAnswer = true;
		$this->clueText = $boards[0]->categories[0]->title;
	}

	public function showFinalClue(){
		$question = Question::where('category_id', $boards[0]->categories[0]->id)->get();
		$this->showClue($question[0]->id, null);
	}

	public function updatePlayerGuess(){
		$game = Game::find($this->gid);

		// see if need to rollover - this only works for now because pid's are 1-4
		$playerCount = count($game->players);
		if($playerCount == $game->player_guess) $nextPlayerGuess = 1;
		else $nextPlayerGuess = $game->player_guess + 1;

		$game->player_guess = $nextPlayerGuess;
		$game->save();
	}

	public function updatePlayerTurn(){
		$game = Game::find($this->gid);
		$playerTurn = $game->player_turn;
		$playerTurn ++;
		$game->player_turn = $playerTurn;
		$game->player_guess = $playerTurn; 
		$game->save();
	}

	public function updateQuestionAsSelected(){
		$question = Question::find($this->clueActiveQuestion->id);
		$question->selected = true;
		$question->save();
	}

	// ============ REDUCER (not using this anymore) ============
	
	public function gameUpdated($data){
		// switch($data['payload']['type']){
		// 	case "returnToBoard": 
		//$this->returnToBoard();
		// 		break;
		// 	case "showAnswer": 
		// 		$this->showAnswer($data['payload']['answer']); 
		// 		break;
		// 	case "showClue": 
		// 		$this->showclue($data['payload']['clue']);
		// 		break;
		// 	default: 
		// 		break;
		// }
	}

	
	// ============ STATE UPDATERS (not using these anymore) ============

	public function returnToBoard(){
		$this->clueActive = false;
		$this->answerActive = false;
	}
	public function showAnswer($answer){
		$this->clueText = $answer;
		$this->answerActive = true;
	}
	public function showClue($clue){
		$this->clueActive = true;
		$this->clueText = $clue;
	}

}
