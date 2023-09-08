<?php

use App\Livewire\About;
use App\Livewire\Home;
use App\Livewire\Note;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');
Route::get('/about', About::class)->name('about');
Route::get('note', Note\Index::class)->name('note.index');
