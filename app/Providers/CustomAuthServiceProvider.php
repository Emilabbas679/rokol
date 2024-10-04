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
//        Auth::provider( 'admin_provider_driver', function ( $app, array $config ) {
//            return new CustomUserProvider( new CustomUserService );
//        } );
//
//
//        Auth::extend( 'admin_session', function ( $app, $name, array $config ) {
//            $guard = new SessionGuard(
//                $name,
//                Auth::createUserProvider( $config[ 'provider' ] ),
//                $this->app['session.store']
//            );
//
//            if (method_exists($guard, 'setCookieJar')) {
//                $guard->setCookieJar($this->app['cookie']->setDefaultPathAndDomain('/admin', 'localhost'));
//            }
//
//            if (method_exists($guard, 'setDispatcher')) {
//                $guard->setDispatcher($this->app['events']);
//            }
//
//            if (method_exists($guard, 'setRequest')) {
//                $guard->setRequest($this->app->refresh('request', $guard, 'setRequest'));
//            }
//
//            if (isset($config['remember'])) {
//                $guard->setRememberDuration($config['remember']);
//            }
//            return $guard;
//        } );
    }
}
