<?php

namespace App\Providers;

use App\Services\CustomAuthGuardService;
use App\Services\CustomUserService;
use Illuminate\Auth\SessionGuard;
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
            return new CustomUserProvider( $app, $config[ 'model' ] );
        } );
    }
}
