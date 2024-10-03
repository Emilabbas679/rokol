<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $articles = Blog::query()
            ->where( 'type', Blog::TYPE_NEWS )
            ->where( 'status', Blog::STATUS_ACTIVE )
            ->get();
        return view( 'news', compact( 'articles' ) );
    }

    public function show( $id )
    {
        $article = Blog::query()
            ->where( 'type', Blog::TYPE_NEWS )
            ->where( 'status', Blog::STATUS_ACTIVE )
            ->findOrFail($id);
        return view( 'news_in', compact( 'article' ) );
    }
}
