<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::view('/login', 'auth.login')->name('login');
Route::view('/register', 'auth.register')->name('register.create');

Route::middleware('auth')->group(function() {
    Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard');
    Route::view('/posts', 'pages.posts')->name('post.create');
});

// auth 
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// posts 
Route::get('/', [PostController::class, 'show'])->name('home');
Route::post('/post', [PostController::class, 'store'])->name('post.store');