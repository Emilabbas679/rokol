<?php

namespace App\Rules;

use App\Models\Cart;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;

class ArrayKeysExists implements
    ValidationRule
{

    public function __construct( private readonly array $keys )
    {
    }

    /**
     * Run the validation rule.
     *
     * @param \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString $fail
     */
    public function validate( string $attribute, mixed $value, Closure $fail ): void
    {
        foreach ( $this->keys as $key ) {
            if ( !DB::table( 'carts' )
                ->where( 'id', $key )
                ->where( 'status', Cart::STATUS_UNCOMPLETED )
                ->exists() ) {
                $fail( "Cart with ID $key does not exist in the database." );
            }
        }
    }
}
