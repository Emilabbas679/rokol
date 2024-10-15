<?php

use App\Models\Translation;
use App\Models\Category;
use App\Models\Type;
use App\Models\ApplicationArea;
use App\Models\Appearance;
use App\Models\Property;
use App\Models\Weight;
use Illuminate\Support\Facades\Cache;

if ( !function_exists( 'translate' ) ) {
    function translate( $key, $locale = null )
    {
        $locale = $locale ?? App::getLocale();

        $supportedLocales = [ 'az', 'en', 'ru' ];
        if ( !in_array( $locale, $supportedLocales ) ) {
            $locale = 'en';
        }

        $translations = Cache::rememberForever( "translations_{$locale}", function () use ( $locale ) {
            return Translation::where( 'locale', $locale )->pluck( 'value', 'key' )->toArray();
        } );

        return $translations[$key] ?? $key;
    }
}


if ( !function_exists( 'menu_categories' ) ) {
    function menu_categories()
    {
        $categories = Cache::remember( 'categories', 1200, function () {
            return Category::where( 'status', 1 )->where( 'category_id', null )->with( 'children' )->get();
        } );
        return $categories;
    }
}
if ( !function_exists( 'properties' ) ) {
    function properties()
    {
        $properties = Cache::remember( 'properties', 1200, function () {
            return $properties = Property::where( 'status', 1 )->get();
        } );
        return $properties;
    }
}
if ( !function_exists( 'types' ) ) {
    function types()
    {
        $types = Cache::remember( 'types', 1200, function () {
            return $types = Type::where( 'status', 1 )->get();
        } );
        return $types;
    }
}
if ( !function_exists( 'applicationAreas' ) ) {
    function applicationAreas()
    {
        $applicationAreas = Cache::remember( 'applicationAreas', 1200, function () {
            return $applicationAreas = ApplicationArea::where( 'status', 1 )->get();
        } );
        return $applicationAreas;
    }
}
if ( !function_exists( 'appearances' ) ) {
    function appearances()
    {
        $appearances = Cache::remember( 'appearances', 1200, function () {
            return $appearances = Appearance::where( 'status', 1 )->get();
        } );
        return $appearances;
    }
}
if ( !function_exists( 'weights' ) ) {
    function weights()
    {
        $weights = Cache::remember( 'weights', 1200, function () {
            return $weights = Weight::where( 'status', 1 )->get();
        } );
        return $weights;
    }
}

if ( !function_exists( 'fUser' ) ) {
    function fUser()
    {
        return auth()->guard( 'web' )->user();
    }
}
if ( !function_exists( 'fUserId' ) ) {
    function fUserId()
    {
        return auth()->guard( 'web' )->id();
    }
}

if ( !function_exists( 'activeClassByQueryParam' ) ) {
    function activeClassByQueryParam( $queryParam, $equal, $cssClass = 'active' ): string
    {
        return ( request()->filled( $queryParam ) && request()->get( $queryParam ) === $equal )
            ? $cssClass
            : '';
    }
}

if ( !function_exists( 'getViewCookie' ) ) {
    function getViewCookie(): string
    {
        $cookie = request()->cookie( 'view' );
        if ( is_null( $cookie ) || empty( trim( $cookie ) ) ) {
            return 'grid';
        }
        return $cookie;
    }
}


