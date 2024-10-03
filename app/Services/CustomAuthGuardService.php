<?php

namespace App\Services;

use App\Providers\CustomUserProvider;
use Illuminate\Auth\GuardHelpers;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

class CustomAuthGuardService implements Guard
{
    use GuardHelpers;

    protected $lastAttempted;
    protected $request;
    protected $inputKey;
    protected $storageKey;

    public function __construct( CustomUserProvider $provider, Request $request )
    {
        $this->provider = $provider;
        $this->request = $request;
        $this->inputKey = 'X-DreamFactory-Session-Token';
        $this->storageKey = 'X-DreamFactory-Session-Token';
    }

    public function user()
    {
        if ( !is_null( $this->user ) ) {
            return $this->user;
        }
    }

    protected function getTokenForRequest()
    {
        $token = $this->request->input( $this->inputKey );
        return $token;
    }

    public function attempt( $credentials, $login = true )
    {
        $user = $this->provider->retrieveByCredentials( $credentials );
        if ( $this->hasValidCredentials( $user ) ) {
            $this->login( $user );
            return true;
        }
        return false;
    }

    protected function hasValidCredentials( $user )
    {
        return !is_null( $user );
    }

    public function login( $user )
    {
        $this->setUser( $user );
    }

    public function validate( array $credentials = [] ) {}

    public function getUser()
    {
        return $this->user;
    }

    public function getProvider()
    {
        return $this->provider;
    }

    public function setProvider( customUserProvider $provider )
    {
        $this->provider = $provider;
        return $this;
    }

    public function setRequest( Request $request )
    {
        $this->request = $request;
        return $this;
    }
}