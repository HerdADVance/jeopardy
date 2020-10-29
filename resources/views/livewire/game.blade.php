<div class="game" wire:poll.5000ms>

	<div class="players">
		@foreach($players as $player)
			 <div 
			 class="player
			 @if($game->player_turn == $player->id) turn @endif
			 @if($game->player_guess == $player->id) guess @endif
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
							wire:click="showClue( {{$question->id}}, {{200 * $game->round * $count}} )" 
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

		<div class="clue-container {{ $clueActive? 'active' : '' }}">
			
			<span class="clue-text">{{ $clueText }}</span>

			@auth
				@if(Auth::user()->id == $game->host)
					<div class="clue-buttons">
							@if($clueActive)
								@if(!$clueActiveAnswer)
									<button wire:click="questionCorrect">Correct</button>
									<button wire:click="questionWrong">Wrong</button>
									<button wire:click="questionAllWrong">All Wrong</button>
								@endif
								@if($clueActiveAnswer)
									<button wire:click="questionContinue">Continue</button>
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
