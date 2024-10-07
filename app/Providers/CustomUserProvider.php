<?php

namespace App\Providers;

use App\Models\User;
use Closure;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Hashing\HashManager;

class CustomUserProvider extends EloquentUserProvider
{

    public function __construct($app, $model)
    {
        parent::__construct( new HashManager( $app ), $model );
    }

    public function retrieveById( $identifier )
    {
        $model = $this->createModel();

        return $this->newModelQuery( $model )
            ->where( $model->getAuthIdentifierName(), $identifier )
            ->where( 'is_admin', true )
            ->first();
    }

    public function retrieveByCredentials( array $credentials )
    {
        return parent::retrieveByCredentials( array_merge( $credentials, [ 'is_admin' => true ] ) );
    }
}
