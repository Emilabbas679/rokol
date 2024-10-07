<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Builder;

class NewsController extends Controller
{
    public function index()
    {
        $articles = Blog::query()
            ->where( 'type', Blog::TYPE_NEWS )
            ->where( 'status', Blog::STATUS_ACTIVE )
            ->when( \request()->filled( 'category_id' )
                && \request()->input( 'category_id' ) > 0
                && \request()->input( 'category_id' ) <= 3,
                function ( Builder $builder ) {
                    $builder->where( 'category', \request()->input( 'category_id' ) );
                } )
            ->get();

        return view( 'news', compact( 'articles' ) );
    }

    public function show( $id )
    {
        $article = Blog::query()
            ->where( 'type', Blog::TYPE_NEWS )
            ->where( 'status', Blog::STATUS_ACTIVE )
            ->findOrFail( $id );

        $similarArticles = Blog::query()
            ->where( 'type', Blog::TYPE_NEWS )
            ->where( 'status', Blog::STATUS_ACTIVE )
            ->where( 'category', $article->category )
            ->whereNot( 'id', $article->id )
            ->take( 8 )
            ->get();
        return view( 'news_in', compact( 'article', 'similarArticles' ) );
    }
}
