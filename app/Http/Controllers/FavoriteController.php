<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class FavoriteController extends Controller
{
    public function index()
    {

        $favorites = Favorite::query()
            ->with( [
                'product',
                'product.prices',
                'product.prices.weight'
            ] )
            ->where( 'user_id', fUserId() )
            ->paginate( 30 );

        return view( 'favorites', compact( 'favorites' ) );
    }

    public function store( Request $request )
    {
        $validated = Validator::validate( $request->all(), [
            'product_id' => [ 'required', 'string', 'numeric', Rule::exists( Product::class, 'id' ) ]
        ] );

        if ( $this->checkFavorite( $validated[ 'product_id' ] ) ) {
            return response()->json( [ 'status' => 'fail' ] );
        }

        Favorite::query()->create( [
            'user_id' => fUserId(),
            'product_id' => $validated[ 'product_id' ]
        ] );

        return response()->json( [ 'status' => 'success' ] );
    }

    public function destroy( Request $request )
    {
        $validated = Validator::validate( $request->all(), [
            'product_id' => [ 'required', 'string', 'numeric', Rule::exists( Product::class, 'id' ) ]
        ] );

        $favorite = Favorite::query()
            ->where( 'user_id', fUserId() )
            ->where( 'product_id', $validated[ 'product_id' ] )
            ->first();


        if ( is_null($favorite) ) {
            return response()->json( [ 'status' => 'fail' ] );
        }

        $favorite->delete();
        return response()->json( [ 'status' => 'success' ] );

    }

    public function checkFavorite( $productId ): bool
    {
        return Favorite::query()->where( 'user_id', fUserId() )->where( 'product_id', $productId )->exists();
    }
}
