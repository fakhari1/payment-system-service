<?php

namespace App\Providers;

use App\Support\Storage\Contracts\StorageInterface;
use App\Support\Storage\SessionStorage;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);

        $cart = new SessionStorage('cart');

        $this->app->bind(StorageInterface::class, function ($app) use ($cart) {
            return $cart;
        });

        view()->composer('*', function ($view) use ($cart) {
            $view->with('cart_count', $cart->count());
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
