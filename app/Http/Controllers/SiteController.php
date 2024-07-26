<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        return view('index');
    }


    public function category($id)
    {
        return view('category');
    }

    public function product($id)
    {
        return view('detail');
    }

    public function locale($lang)
    {
        if (in_array($lang, ['en', 'az', 'ru'])) {
            session(['locale' => $lang]);
        }

        return redirect()->back();

    }
}


