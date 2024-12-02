<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        $catalogs = Catalog::query()->get();
        return view( 'catalog', compact('catalogs') );
    }

    public function show($id)
    {
        $catalog = Catalog::query()->findOrFail($id);
        $path = storage_path('app/public/'.$catalog->path);
        return response()->file($path);
    }
}
