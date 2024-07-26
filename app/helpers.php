<?php

use App\Models\Translation;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;

if (!function_exists('translate')) {
    function translate($key, $locale = null)
    {
        $locale = $locale ?? App::getLocale();

        $supportedLocales = ['az', 'en', 'ru'];
        if (!in_array($locale, $supportedLocales)) {
            $locale = 'en';
        }

        $translations = Cache::rememberForever("translations_{$locale}", function () use ($locale) {
            return Translation::where('locale', $locale)->pluck('value', 'key')->toArray();
        });
        
        return $translations[$key] ?? $key;
    }
}


if (!function_exists('menu_categories')) {
    function menu_categories()
    {
        $categories = Cache::rememberForever('categories', function () {
           return $categories = Category::where('status',1)->where('category_id', null)->with('children')->get();
        });
        return $categories;
    }
}
