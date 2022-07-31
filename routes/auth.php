<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;


Route::prefix('auth')->group(function () {
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
    Route::post('/register', [RegisterController::class, 'register'])->name('register');

    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');


Route::get('/forget-password', function () {

})->name('forget-password');

Route::post('/logout', function () {
    auth()->logout();
})->name('logout');
