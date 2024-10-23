<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Product;
use App\Models\ProductPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class FavoriteController extends Controller
{
    public function index()
    {

        $favorites = Favorite::query()
                             ->with( [
                                         'product',
                                         'productPrice',
                                         'ProductPrice.weight'
                                     ] )
                             ->where( 'user_id', fUserId() )
                             ->orderByDesc( 'created_at' )
                             ->paginate( 1 );

        return view( 'favorites', compact( 'favorites' ) );
    }

    public function store( Request $request )
    {
        $validator = Validator::make( $request->all(), [
            'product_id' => [ 'required', 'string', 'numeric', Rule::exists( Product::class, 'id' ) ],
            'price_id'   => [ 'required', 'string', 'numeric', Rule::exists( ProductPrice::class, 'id' ) ],
        ] );

        $validator->after( function ( \Illuminate\Validation\Validator $validator ) {
            if ( $this->checkFavorite( $validator->getValue( 'product_id' ), $validator->getValue( 'price_id' ) ) ) {
                $validator->errors()->add(
                    'message', 'The product already exists in favorites'
                );
            }
        } );

        $validator->validate();


        $validated = $validator->validated();

        Favorite::query()->create( [
                                       'user_id'    => fUserId(),
                                       'product_id' => $validated['product_id'],
                                       'price_id'   => $validated['price_id']
                                   ] );

        Cache::forget( "favorites:count:user:" . fUserId() );

        return response()->json( [ 'status' => 'success' ] );
    }

    public function destroy( Request $request )
    {
        $validated = Validator::validate( $request->all(), [
            'product_id' => [ 'required', 'string', 'numeric', Rule::exists( Product::class, 'id' ) ],
            'price_id'   => [ 'required', 'string', 'numeric', Rule::exists( ProductPrice::class, 'id' ) ],
        ] );

        $favorite = Favorite::query()
                            ->where( 'user_id', fUserId() )
                            ->where( 'product_id', $validated['product_id'] )
                            ->where( 'price_id', $validated['price_id'] )
                            ->first();


        if ( is_null( $favorite ) ) {
            return response()->json( [ 'status' => 'fail' ] );
        }

        $favorite->delete();
        Cache::forget( "favorites:count:user:" . fUserId() );
        return response()->json( [ 'status' => 'success' ] );

    }

    public function checkFavorite( $productId, $priceId ): bool
    {
        return Favorite::query()->where( 'user_id', fUserId() )
                       ->where( 'product_id', $productId )
                       ->where( 'price_id', $priceId )
                       ->exists();
    }
}
