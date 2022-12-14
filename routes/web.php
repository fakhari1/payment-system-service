<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Support\Storage\Contracts\StorageInterface;
use App\Http\Controllers\PaymentController;
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

require __DIR__ . '/auth.php';

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('home');
    });

    Route::get('cart/clear', function () {
        resolve(StorageInterface::class)->clear();
        return redirect()->route('products');
    });

    Route::prefix('cart')->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('cart.show');
        Route::get('increment/{product}', [CartController::class, 'increment'])->name('cart.increment');
        Route::get('decrement/{product}', [CartController::class, 'decrement'])->name('cart.decrement');

        Route::get('checkout', [CartController::class, 'checkoutForm'])->name('cart.checkout.form');
        Route::post('checkout', [CartController::class, 'checkout'])->name('cart.checkout');

        Route::patch('update/{product}', [CartController::class, 'update'])->name('cart.update');

        Route::delete('delete/{product}', [CartController::class, 'destroy'])->name('cart.item.delete');
    });


    Route::prefix('payment')->group(function () {
        Route::post('{gateway}/callback', [PaymentController::class, 'verify'])->name('payment.verify');
    });
});


Route::prefix('products')->group(function () {

    Route::get('/', [ProductController::class, 'index'])->name('products');

    Route::get('{product}', [ProductController::class, 'show'])->name('products.show');

    Route::get('{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::patch('{product}/update', [ProductController::class, 'update'])->name('products.update');

    Route::delete('{product}/delete', [ProductController::class, 'destroy'])->name('products.delete');
});
