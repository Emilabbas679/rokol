<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        $catalog = Catalog::query()->first();
        if (is_null($catalog)) {
            $path = storage_path('app/public/pdfs/catalogs.pdf');
        } else {
            $path = storage_path('app/public/' . $catalog->path);
        }
        return response()->file($path);
    }
}
