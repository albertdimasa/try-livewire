<?php

use App\Livewire\About;
use App\Livewire\Home;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');
Route::get('/about', About::class)->name('about');
Route::get('note', App\Livewire\Note\Index::class)->name('note.index');
