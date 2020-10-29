<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $form = [
        'username' => '',
        'password' => ''
    ];

    public function submit(){
        $this->validate([
            'form.username'    => 'required',
            'form.password' => 'required',
        ]);

        Auth::attempt($this->form);
        return redirect('/game/1');
    }

    public function username(){
        return 'username';
    }

    public function render()
    {
        return view('livewire.login');
    }
}