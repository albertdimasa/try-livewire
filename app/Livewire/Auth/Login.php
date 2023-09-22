<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    public function login()
    {
        $this->validate([
            'email'     => 'required|email',
            'password'  => 'required'
        ]);

        if(Auth::attempt(['email' => $this->email, 'password'=> $this->password])) {
            $this->redirect('/');
        } else {
            session()->flash('message', 'Email atau Password Anda salah!');
            $this->reset();
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
