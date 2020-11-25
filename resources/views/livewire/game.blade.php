<div class="game">

	<div class="players">
		@auth{{Auth::user()->id}}@endauth
		@foreach($players as $player)
			 <div 
			 class="player
			 @if($game->player_turn == $player->user_id) turn @endif
			 @if($game->player_guess == $player->user_id) guess @endif
			 "
			 wire:key="player-{{$player->id}}">
				<span class="player-name">{{ $player->user->name }}: </span>
				<span class="player-score">{{ $player->score }}</span>
			</div>
		@endforeach
	</div>

	<div class="board" wire:key="board-{{$board->id}}">
		@if($game->round < 3)
			@foreach($categories as $category)
				<div class="category" wire:key="category-{{$category->id}}">
					@php $count = 1 @endphp
					<div class="category-title">{{ $category->title }}</div>
					@foreach($category->questions as $question)
						<div 
							class="question" 
							@auth wire:click="handleClueClick( {{$question->id}}, {{Auth::user()->id}} )"@endauth
							wire:key="question-{{$question->id}}"
						>
							@if(!$question->selected)
								<span class="question-value">{{200 * $game->round * $count}}</span>
							@endif
						</div>
						@php $count ++ @endphp
					@endforeach
				</div>
			@endforeach
		@endif

		<div class="clue-container {{ $game->clue_active? 'active' : '' }}">
			
			<span class="clue-text">{{ $game->active_text }}</span>

			@auth
				@if(Auth::user()->id == $game->host)
					<div class="clue-buttons">
							@if($game->clue_active)
								@if(!$game->answer_active)
									<button wire:click="handleAnswerCorrectClick( {{Auth::user()->id}} )">Correct</button>
									<button wire:click="handleAnswerWrongClick( {{Auth::user()->id}} )">Wrong</button>
									<button wire:click="questionAllWrong">All Wrong</button>
								@endif
								@if($game->answer_active)
									<button wire:click="handleContinueClick( {{Auth::user()->id}} )">Continue</button>
								@endif
							@endif
					</div>
				@endif
				@if(Auth::user()->id > 1)
					<div class="player-actions">
						@if($game->round == 3)
							<form>
								<input type="text" name="player-final-wager" placeholder="Final Wager" />
								<button type="submit">Submit Wager</button>
							</form>
						@endif
					</div>
				@endif
			@endauth

		</div>

	</div>	

	@auth
		@if(Auth::user()->id == $game->host)<button class="next-round" wire:click="nextRound">Next Round</button>@endif
	@endauth	
	
	@auth
		<livewire:logout />
	@endauth


</div>
