<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\ShoppingCart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        //Manejo de sesiones para trabajar el carrito.
        View::composer('*', function($view){
            $sessionName = 'shopping_cart_id';
            $shopping_cart_id = \Session::get($sessionName);
            $shopping_cart = ShoppingCart::findOrCreateById($shopping_cart_id);
        
            \Session::put($sessionName, $shopping_cart->id);
            $view->with('productsCount',  $shopping_cart->id);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
