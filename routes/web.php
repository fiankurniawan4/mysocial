<?php

use App\Livewire\Home;
use App\Livewire\Articles\Index;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');
Route::get('/articles/{slug}', Index::class)->name('articles');
