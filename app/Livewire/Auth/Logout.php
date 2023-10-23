<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Logout extends Component
{
    public function logout()
    {
        add_task("Melakukan Log Out", Auth::id());
        Session::flush();
        Auth::logout();
        
        return redirect('/');
    }

    public function render()
    {
        return view('livewire.auth.logout');
    }
}
