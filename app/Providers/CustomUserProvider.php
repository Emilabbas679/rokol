<?php

namespace App\Providers;

use App\Models\User;
use App\Services\CustomUserService;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Support\Facades\Hash;

class CustomUserProvider implements UserProvider
{

    public function __construct( private CustomUserService $userService )
    {
    }

    public function retrieveById( $identifier )
    {
        $result = $this->userService->getUserByID( $identifier );
        if ( empty( $result ) ) {
            $user = null;
        } else {
            $user = new User( $result );
        }

        return $user;
    }

    public function retrieveByToken( $identifier, $token )
    {
        $result = $this->userService->getUserByToken( $token );
        if ( count( $result ) === 0 ) {
            $user = null;
        } else {
            $user = new User( $result[ 0 ] );
        }

        return $user;
    }

    public function updateRememberToken( Authenticatable $user, $token )
    {
        $user->setRememberToken($token);

        $timestamps = $user->timestamps;

        $user->timestamps = false;

        $user->save();

        $user->timestamps = $timestamps;
    }

    public function retrieveByCredentials( array $credentials ): ?User
    {
        $result = $this->userService->getUserByCredentials( $credentials );

        if ( empty( $result ) ) {
            $user = null;
        } else {
            $user = new User( $result );
        }
        return $user;

    }

    public function validateCredentials( Authenticatable $user, array $credentials ): bool
    {
        dump( $user );
        return true;
    }
}
