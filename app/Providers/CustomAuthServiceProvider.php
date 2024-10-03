<?php

namespace App\Providers;

use App\Services\CustomAuthGuardService;
use App\Services\CustomUserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class CustomAuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Auth::provider( 'admin_provider_driver', function ( $app, array $config ) {
            return new CustomUserProvider( new CustomUserService );
        } );


        Auth::extend( 'admins', function ( $app, $name, array $config ) {
            $guard = new CustomAuthGuardService(
                Auth::createUserProvider( $config[ 'provider' ] ),
                $app[ 'request' ]
            );

            $app->refresh( 'request', $guard, 'setRequest' );
            return $guard;
        } );
    }
}
