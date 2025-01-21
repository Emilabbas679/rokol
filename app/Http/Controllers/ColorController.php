<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\ColorGroup;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::query()->where( 'is_catalog', true )->get();

        return view( 'colors', compact( 'colors' ) );
    }

    public function colorGroups()
    {
        $colorGroups = ColorGroup::query()->where( 'display', true )->get();
        return view( 'color_groups', compact( 'colorGroups' ) );
    }

    public function colorGroupsShow( $id )
    {

        $colorGroup = ColorGroup::query()->where( 'display', true )->findOrFail( $id );
        $colors     = $colorGroup->colors;
        return view( 'colors', compact( 'colors', 'colorGroup' ) );
    }
}
