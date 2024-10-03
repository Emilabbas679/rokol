<?php

namespace App\Services;


use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CustomUserService
{

    public function __construct() {}

    public function getUserByID( mixed $identifier ) {
        return User::query()
            ->where( 'is_admin', true )
            ->find( $identifier );
    }

    public function getUserByCredentials( array $credentials ) {
        $user = User::query()
            ->where( 'email', $credentials['email'] )
            ->where( 'is_admin', true )
            ->first();
        if (is_null($user)){
            return null;
        }
        if (Hash::check( $credentials[ 'password' ], $user->password )){
            return $user;
        }
        return null;
    }


}