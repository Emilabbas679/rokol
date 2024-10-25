<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Favorite;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
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
        Paginator::defaultView('vendor.pagination.default');
        View::composer( 'partials.cart_icon', function ( \Illuminate\View\View $view ) {
            if ( fUser() ) {
                $carts = Cart::query()
                             ->where( 'user_id', fUser()->id )
                             ->where( 'status', Cart::STATUS_UNCOMPLETED )
                             ->get();
                $view->with( 'cartsCount', $carts->count() );
            }
            else {
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
        View::composer( 'partials.fav_icon', function ( \Illuminate\View\View $view ) {
            if ( fUser() ) {
                $favoritesCount = Cache::rememberForever("favorites:count:user:".fUserId(), function () {
                    $favoritesCount = Favorite::query()
                                   ->where( 'user_id', fUserId() )
                                   ->count( 'id' );
                    if ($favoritesCount > 99) {
                        $favoritesCount = '99+';
                    }
                    return $favoritesCount;
                });

                $view->with( 'favoritesCount', $favoritesCount );
            } else {
                $view->with( 'favoritesCount', 0 );
            }

        } );
    }
}
