<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.auth')]
class Login extends Component
{
    public $email;
    public $password;
    public $show_text;
    public $isDisabled;

    public function login()
    {
        $this->isDisabled = true;

        $validated = Validator::make($this->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validated->fails()) {
            $this->isDisabled = false;
        }
        
        if(Auth::attempt(['email' => $this->email, 'password'=> $this->password])) {
            add_task("Melakukan Login ", Auth::id());
            return redirect('/');

        } else {
            session()->flash('message', 'Email atau Password Anda salah!');
            $this->reset();

        }
    }

    public function akun_user()
    {
        $this->email = 'user@user.com';
        $this->password = '12345678';
        $this->login();
    }

    public function akun_admin()
    {
        $this->email = 'adm@admin.com';
        $this->password = '12345678';
        $this->login();
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
