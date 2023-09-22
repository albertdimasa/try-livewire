<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;

class Register extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    public function store()
    {
        $this->validate([
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|confirmed'
        ]);

        $user = User::create([
            'name'      => $this->name,
            'email'     => $this->email,
            'password'  => bcrypt($this->password)
        ]);

        if($user) {
            session()->flash('success', 'Register Berhasil!.');
            return redirect()->route('auth.login');
        }
    }
    
    public function render()
    {
        return view('livewire.auth.register');
    }
}
