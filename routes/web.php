<?php

use App\Livewire\Home;
use App\Livewire\Auth\Profile;
use App\Livewire\Articles\Index;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Livewire\Chat\Chat;

Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('loginAuth');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', Home::class)->name('home');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/articles/{slug}', Index::class)->name('articles');
    Route::get('/profile/{id}', Profile::class)->name('profile');
    Route::get('/chat/{id}', Chat::class)->name('chat');
});
