<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

use function PHPSTORM_META\type;

#[Layout('layouts.auth')]
class Login extends Component
{
    public $email;
    public $password;
    public $show_text;

    public function login()
    {
        $this->validate([
            'email'     => 'required|email',
            'password'  => 'required'
        ]);

        if(Auth::attempt(['email' => $this->email, 'password'=> $this->password])) {
            add_task("Melakukan Login ", Auth::id());

            $this->redirect('/');
        } else {
            session()->flash('message', 'Email atau Password Anda salah!');
            
            add_task("Login Gagal", 0);

            $this->reset();
        }
    }

    public function akun_demo()
    {
        $this->email = 'demo@example.com';
        $this->password = '12345678';
    }

    public function show_password()
    {
        if ($this->password != '' && $this->show_text == 'text') {
            $this->show_text = 'password';
        } else {
            $this->show_text = 'text';
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
