<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        $colors = Color::query()->get();

        return view('catalogs', compact('colors'));
    }
}
