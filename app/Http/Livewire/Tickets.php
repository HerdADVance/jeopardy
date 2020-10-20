<?php

namespace App\Http\Livewire;
use App\Ticket;

use Livewire\Component;

class Tickets extends Component
{

	public $active = 2;

	protected $listeners = ['ticketSelected'];

	public function ticketSelected($ticketId){
		$this->active = $ticketId;
	}

    public function render()
    {
        return view('livewire.tickets', [
        	'tickets' => Ticket::all()
        ]);
    }
}
