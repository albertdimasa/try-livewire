<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Logout;
use App\Livewire\Auth\Register;
use App\Livewire\History;
use App\Livewire\About;
use App\Livewire\Home;
use App\Livewire\Note;
use App\Livewire\NoteTable;
use App\Livewire\User;
use App\Livewire\Qr;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest'], function () {
    Route::get('register', Register::class)->name('register');
    Route::get('login', Login::class)->name('login');
    Route::get('logout', Logout::class)->name('logout');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', Home::class)->name('home');
    Route::get('about', About::class)->name('about');
    Route::get('note-baru', NoteTable::class);
    Route::get('notes', Note\Index::class)->name('note.index');
    Route::get('history', History::class)->name('history');
    Route::get('qr', Qr\Index::class)->name('qr');
    Route::group(['middleware' => 'role:admin'], function () {
        Route::get('user', User\Index::class)->name('user.index');
    });
});
