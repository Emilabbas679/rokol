<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer( 'partials.cart_icon', function (\Illuminate\View\View $view) {
            if (fUser()){
                $carts   = Cart::query()
                               ->where( 'user_id', fUser()->id )
                               ->where( 'status', Cart::STATUS_UNCOMPLETED )
                               ->get();
                $view->with( 'cartsCount', $carts->count() );
            } else {
                $cookieCarts = \request()->cookie( 'carts' );
                if ( !$cookieCarts ) {
                    $view->with( 'cartsCount', 0 );
                    return;
                }
                if ( is_string( $cookieCarts ) ) {
                    $cookieCarts = collect( json_decode( $cookieCarts, true ) );
                }
                $view->with( 'cartsCount', $cookieCarts->count() );
            }

        } );
    }
}
