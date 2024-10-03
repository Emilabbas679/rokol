<?php

namespace App\Providers;

use App\Models\User;
use App\Services\CustomUserService;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;

class CustomUserProvider implements UserProvider
{
    private $userService;

    public function __construct( CustomUserService $userService )
    {
        $this->userService = $userService;
    }

    public function retrieveById( $identifier )
    {
        $result = $this->userService->getUserByID( $identifier );
        if ( is_null( $result ) ) {
            $user = null;
        } else {
            $user = new User( $result[ 0 ] );
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
        // Implement your own.
    }

    public function retrieveByCredentials( array $credentials ): ?User
    {
        $result = $this->userService->getUserByCredentials( $credentials );
        if ( is_null( $result ) ) {
            $user = null;
        } else {
            $user = new User( $result->toArray() );
        }
        return $user;

    }

    public function validateCredentials( Authenticatable $user, array $credentials ): bool
    {
        return true;
    }
}
