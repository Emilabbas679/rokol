<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::query()->where('is_catalog', true)->get();

        return view('colors', compact('colors'));
    }
}
