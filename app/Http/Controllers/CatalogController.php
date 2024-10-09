<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        return response()->file(storage_path('app/public/pdfs/catalogs.pdf'));
    }
}
