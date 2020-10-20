<div>
    <h1>Tickets</h1>

    @foreach($tickets as $ticket)
    	<div class="ticket {{ $active == $ticket->id ? 'active' : '' }}" wire:click="$emit('ticketSelected', {{ $ticket->id }})">
    		<p>{{ $ticket->question }}</p>
    	</div>
    @endforeach

</div>
