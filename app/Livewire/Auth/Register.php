<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.auth')]
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

        $user->assignRole('user');

        if($user) {
            add_task("Register Berhasil ", $user->id);

            session()->flash('success', 'Register Berhasil!.');
            return redirect()->route('login');
        }
    }
    
    public function render()
    {
        return view('livewire.auth.register');
    }
}
