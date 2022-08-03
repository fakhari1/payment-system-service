<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require 'auth.php';

Route::get('/', function () {
    return view('welcome');
//    $url = URL::temporarySignedRoute('test', Carbon::now()->addMinutes(60), ['id' => 12]);
//    dd($url);
});

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('verify', fn() => 'hi')->name('test');
