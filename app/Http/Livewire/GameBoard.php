<?php

namespace App\Http\Livewire;

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

	public $clueActive = false;
	public $clueActiveAnswer = false;

	public $clueActiveAmount = null;
	public $clueActiveQuestion = null;
	public $clueText = null;

	public $questionCorrect = false;
	
	public function nextRound(){
		$this->resetClueState();
		$game = Game::find($this->gid);
		
		if($game->round == 2) $this->showFinalCategory();
		if($game->round == 3) return;
		
		$game->round ++;
		$game->save();
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

	public function showAnswer(){
		$this->clueText = $this->clueActiveQuestion->answer;
		$this->clueActiveAnswer = true;
	}

	public function showClue($qid, $amount){
		$this->clueActive = true;
		$this->clueActiveAmount = $amount;

		$question = Question::find($qid);
		$this->clueActiveQuestion = $question;
		$this->clueText = $question->clue;
	}

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

    public function render(Request $request)
    {
    	if(!$this->gid) $this->gid = $request->gid;

    	$game = Game::find($this->gid);
    	$round = $game->round;
    	$players = Player::with('user')->where('game_id', $this->gid)->get();
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
}
