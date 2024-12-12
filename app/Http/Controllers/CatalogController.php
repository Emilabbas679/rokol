<?php

namespace App\Http\Controllers;

use App\Models\Catalog;

class CatalogController extends Controller
{
    public function index()
    {
        $catalogs = Catalog::query()
                           ->orderByDesc( 'created_at' )
                           ->paginate( 16 );
        return view( 'catalog', compact( 'catalogs' ) );
    }

    public function show( $id )
    {
        $catalog = Catalog::query()->findOrFail( $id );
        $path    = storage_path( 'app/public/' . $catalog->path );
        return response()->file( $path );
    }
}
