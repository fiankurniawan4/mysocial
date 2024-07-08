<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Livewire\Home;
use App\Livewire\Articles\Index;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');

Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('loginAuth');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/articles/{slug}', Index::class)->name('articles');
});
