<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\VerificationController;


Route::prefix('auth')->group(function () {
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
    Route::post('/register', [RegisterController::class, 'register'])->name('register');

    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [LoginController::class, 'login'])->name('login');

    Route::post('/verify-email', [VerificationController::class, 'verify'])->name('user.email.verify');

    Route::get('/forget-password', [VerificationController::class, 'verify'])->name('forget-password');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});




