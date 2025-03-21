<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Filter;
use App\Models\Modal;
use App\Models\Page;
use App\Models\Slider;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Blog;
use App\Models\ProductPrice;
use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    public function index()
    {
        $videoNews = Blog::query()
                         ->where( 'type', Blog::TYPE_NEWS )
                         ->where( 'status', Blog::STATUS_ACTIVE )
                         ->where( 'is_video', true )
                         ->take( 15 )
                         ->get();
        $sliders   = Slider::query()
                           ->where( 'status', Slider::STATUS_ACTIVE )
                           ->get();

        $modal = Modal::query()
                      ->where( 'expire_time', '>', now() )
                      ->first();
        return view( 'index', compact( 'sliders', 'videoNews', 'modal' ) );
    }


    public function getSubCategories( Request $request )
    {
        $id          = $request->id ?? 0;
        $category_id = $request->category_id ?? 0;
        $subs        = Category::where( 'status', 1 )->where( 'category_id', $id )->get();
        $html        = '';
        $html        .= "<option value='" . $id . "'>" . translate( 'all' ) . '</option>';
        foreach ( $subs as $item ) {

            $selected = '';
            if ( $item->id == $category_id )
                $selected = 'selected';
            $html .= '<option value="' . $item->id . '" ' . $selected . ' >' . $item->name[app()->getLocale()] ?? '' . '</option>';
        }

        return response()->json( [
                                     'status' => true,
                                     'html'   => $html
                                 ] );

    }

    public function category( $id = 0 )
    {
        $categories = Cache::rememberForever( 'main_categories', function () {
            return Category::query()->with( [ 'children' ] )->where( 'status', 1 )
                           ->where( 'category_id', null )->get();
        } );

        if ( \request()->filled( 'parent_category_id' ) ) {
            $id = \request()->input( 'parent_category_id' );
        }

        if ( \request()->filled( 'category_id' ) ) {
            $id = \request()->input( 'category_id' );
        }

        if ( $id == 0 ) {
            $categoryIds = [];
            $category    = [
                'name'        => [ app()->getLocale() => translate( 'products' ) ],
                'id'          => 0,
                'category_id' => 0
            ];
        }
        else {
            $category = Category::query()
                                ->where( 'status', 1 )
                                ->where( 'id', $id )
                                ->firstOrFail();


            $subCategoryIds = Cache::rememberForever( "sub_categories:" . $id, function () use ( $id ) {
                $subCategories = Category::where( 'status', 1 )->where( 'category_id', $id )
                                         ->select( 'id', 'status', 'category_id' )->get()->toArray();
                return array_column( $subCategories, 'id' );
            } );
            $categoryIds    = $subCategoryIds;
            $categoryIds[]  = $id;
        }


        $selected              = [];
        $selected['min_price'] = 0;
        $selected['max_price'] = 1000;

        if ( request()->has( 'min_price' ) and ( (int) request()->min_price ) > 0 )
            $selected['min_price'] = (int) request()->min_price;
        if ( request()->has( 'max_price' ) and ( (int) request()->max_price ) <= 10000 )
            $selected['max_price'] = (int) request()->max_price;


        $query = Product::query()
                        ->select( [
                                      'products.id',
                                      'products.status',
                                      'products.category_id',
                                      'products.image',
                                      'products.name',
                                      'products.offer_of_week',
                                      'products.pdf_path',
                                      DB::raw( 'pp.id as price_id' ),
                                      'pp.sale_price',
                                      'pp.price',
                                      'pp.weight_id',
                                      'w.weight_type',
                                      'w.weight'
                                  ] )
                        ->with( [
                                    'category',
                                    'refProperties'
                                ] )
                        ->where( 'products.status', 1 );


        if ( auth( 'web' )->check() ) {
            $query->with( [ 'favorites' ] );
        }
        $query->join( DB::raw( 'product_prices as pp' ), 'pp.product_id', '=', 'products.id' );
        $query->join( DB::raw( 'weights as w' ), 'w.id', '=', 'pp.weight_id' );
        $query->when( request()->has( 'min_price' ) || request()->has( 'max_price' ), function ( Builder $query ) {
            if ( request()->has( 'min_price' ) ) {
                $minPrice = request()->input( 'min_price' );
                $query->where( function ( Builder $query ) use ( $minPrice ) {
                    $query->where( 'price', '>=', $minPrice )
                          ->orWhere( 'sale_price', '>=', $minPrice );
                } );
            }
            if ( request()->has( 'max_price' ) ) {
                $maxPrice = request()->input( 'max_price' );
                $query->where( function ( Builder $query ) use ( $maxPrice ) {
                    $query->where( 'price', '<=', $maxPrice )
                          ->orWhere( 'sale_price', '<=', $maxPrice )
                          ->whereNot( 'sale_price', 0 );
                } );
            }
        } )
              ->when( request()->filled( 'q' ), function ( Builder $builder ) {
                  $builder->where( function ( Builder $builder ) {
                      $q = mb_strtolower( request()->get( 'q' ) );
                      $builder->whereRaw( 'LOWER(JSON_UNQUOTE(JSON_EXTRACT(`name`, \'$.' . ( app()->getLocale() ) . '\'))) LIKE \'%' . ( $q ) . '%\'' )
                              ->orWhereRaw( 'LOWER(JSON_UNQUOTE(JSON_EXTRACT(`about`, \'$.' . ( app()->getLocale() ) . '\'))) LIKE \'%' . ( $q ) . '%\'' );

                  } );
              } );

        if ( $category['id'] != 0 ) {
            $query->whereIn( 'category_id', $categoryIds );
        }
//        if (request()->has('min_price') || request()->has('max_price')) {
//            $query->whereHas('prices', function ($query) use ($minPrice, $maxPrice) {
//                $query->where(function ($query) use ($minPrice, $maxPrice) {
//                    $query->where(function ($query) use ($minPrice) {
//                        $query->where('price', '>=', $minPrice)
//                            ->orWhere('sale_price', '>=', $minPrice);
//                    })->where(function ($query) use ($maxPrice) {
//                        $query->where('price', '<=', $maxPrice)
//                            ->orWhere('sale_price', '<=', $maxPrice);
//                    });
//                });
//            });
//        }
        $filters = collect();
        if ( request()->has( 'properties' ) ) {
            if ( is_array( request()->properties ) ) {
                $selected['properties'] = request()->properties;
                $query->whereHas( 'refProperties', function ( $query ) use ( $selected ) {
                    $query->whereIn( 'property_id', $selected['properties'] );
                } );
            }
        }
        if ( request()->has( 'types' ) ) {
            if ( is_array( request()->types ) ) {
                $selected['types'] = request()->types;
                $query->whereHas( 'types', function ( $query ) use ( $selected ) {
                    $query->whereIn( 'type_id', $selected['types'] );
                } );
            }
        }
        if ( request()->has( 'applicationAreas' ) ) {
            if ( is_array( request()->applicationAreas ) ) {
                $selected['applicationAreas'] = request()->applicationAreas;
                $query->whereHas( 'applicationAreas', function ( $query ) use ( $selected ) {
                    $query->whereIn( 'application_area_id', $selected['applicationAreas'] );
                } );
            }
        }
        if ( request()->has( 'appearances' ) ) {
            if ( is_array( request()->appearances ) ) {
                $selected['appearances'] = request()->appearances;
                $query->whereHas( 'appearances', function ( $query ) use ( $selected ) {
                    $query->whereIn( 'appearance_id', $selected['appearances'] );
                } );
            }
        }
        if ( request()->has( 'weights' ) ) {
            if ( is_array( request()->weights ) ) {
                $selected['weights'] = request()->weights;
                $query->whereIn( 'w.id', $selected['weights'] );
            }
        }

        if ( \request()->has( 'brands' ) ) {
            $selected['brands'] = request()->brands;
            $query->whereIntegerInRaw( 'brand_id', $selected['brands'] );
        }

        if ( request()->filled( 'sort_by' ) ) {
            $exploded = explode( ',', request()->input( 'sort_by' ) );
            if ( is_array( $exploded ) && count( $exploded ) == 2 && in_array( $exploded[1], [ 'asc', 'desc' ] ) ) {
                if ( $exploded[0] == 'price' ) {
                    $query->orderBy( 'pp.' . $exploded[0], $exploded[1] );
                }
                if ( $exploded[0] == 'name' ) {
                    $query->orderBy( 'products.name->' . app()->getLocale(), $exploded[1] );
                }
            }
        }

        $query->orderBy( 'category_id' );
        $query->orderBy( 'products.id' );
        $products = $query->get( 32 );

        $filters = $this->getFiltersApi( $category['id'], true );

        $products = $this->paginate( $products, \request()->input( 'page' ) );


        if ( \request()->ajax() ) {
            return response()->json( [
                                         'status'       => 1,
                                         'htmlGrid'     => view( 'partials.products', compact( 'products' ) )->render(),
                                         'htmlList'     => view( 'partials.products-list', compact( 'products' ) )->render(),
                                         'count'        => count( $products ),
                                         'nextPageUrl'  => $products->nextPageUrl(),
                                         'hasMorePages' => $products->hasMorePages()
                                     ] );
        }


        return view( 'category', compact( 'category', 'categories', 'products', 'selected', 'filters' ) );
    }

    public function product( Request $request, $id )
    {
        $priceId              = $request->get( 'price_id' );
        $product              = Product::query()
                                       ->where( 'id', $id )
                                       ->where( 'status', 1 )
                                       ->with( [
                                                   'category',
                                                   'prices',
                                                   'prices.weight',
                                                   'types',
                                                   'appearances',
                                                   'refProperties',
                                                   'applicationAreas',
                                                   'favorites',
                                                   'similar',
                                                   'colorGroups.colors',
                                                   'colorGroups.colors.children'
                                               ] )
                                       ->firstorfail();
        $locale               = app()->getLocale();
        $product->name        = $product->name[$locale] ?? '';
        $product->about       = $product->about[$locale] ?? '';
        $product->usage       = $product->usage[$locale] ?? '';
        $product->advantage   = $product->advantage[$locale] ?? '';
        $product->properties  = $product->properties[$locale] ?? '';
        $product->consumption = $product->consumption[$locale] ?? '';
        $product->retention   = $product->retention[$locale] ?? '';
        $product->warning     = $product->warning[$locale] ?? '';
        $product->guarantee   = $product->guarantee[$locale] ?? '';
        $product->apply       = $product->apply[$locale] ?? '';
        $product->usage_rules = $product->usage_rules[$locale] ?? '';
        $color_id             = 0;
        $weight_id            = 0;
        $groupedColors        = Color::query()->where( 'is_catalog', true )->get()->groupBy( 'code' );
//        $weights              = [];
        if ( $request->has( 'color' ) and ( (int) $request->color ) != 0 )
            $color_id = (int) $request->color;
        if ( $request->has( 'weight' ) and ( (int) $request->weight ) != 0 )
            $weight_id = (int) $request->weight;
        if ( $color_id != 0 or $weight_id != 0 ) {
            $prices = ProductPrice::where( 'product_id', $product->id )
                                  ->when( $color_id != 0, function ( $query ) use ( $color_id ) {
                                      $query->where( 'color_id', $color_id );
                                  } )
                                  ->when( $weight_id != 0, function ( $query ) use ( $weight_id ) {
                                      $query->where( 'weight_id', $weight_id );
                                  } )->get();
        }
        else
            $prices = $product->prices ?? [];


        $price = collect( $prices )->where( 'id', $priceId )->first() ?? ( $prices[0] ?? [] );
//        if ( isset( $price['color_id'] ) ) {
//            $price_weights = ProductPrice::where( 'product_id', $product->id )->where( 'color_id', $price->color_id )
//                                         ->get();
//            foreach ( $price_weights as $item ) {
//                if ( !isset( $weights[$item->weight_id] ) )
//                    $weights[$item->weight_id] = $item;
//            }
//        }

        return view( 'detail', compact( 'product', 'price', 'groupedColors' ) );
    }

    public function productPrice( Request $request, $product_id )
    {
        $product   = Product::where( 'id', $product_id )->with( 'prices' )->firstorfail();
        $color_id  = 0;
        $weight_id = 0;
        $colors    = [];
        $weights   = [];
        if ( $request->has( 'color_id' ) and ( (int) $request->color_id ) != 0 )
            $color_id = (int) $request->color_id;
        if ( $request->has( 'weight_id' ) and ( (int) $request->weight_id ) != 0 )
            $weight_id = (int) $request->weight_id;
        if ( $color_id != 0 or $weight_id != 0 ) {
            $prices = ProductPrice::where( 'product_id', $product->id )
                                  ->when( $color_id != 0, function ( $query ) use ( $color_id ) {
                                      $query->where( 'color_id', $color_id );
                                  } )
                                  ->when( $weight_id != 0, function ( $query ) use ( $weight_id ) {
                                      $query->where( 'weight_id', $weight_id );
                                  } )->get();
        }
        else
            $prices = $product->prices ?? [];

        foreach ( $prices as $item ) {
            if ( !isset( $weights[$item->weight_id] ) )
                $weights[$item->weight_id] = $item;
        }
        foreach ( $product->prices as $item ) {
            if ( !isset( $item[$item['color_id']] ) )
                $colors[$item->color_id] = $item;
        }
        $price       = $prices[0] ?? [];
        $returnHTML  = view( 'partials.product_color_weights', compact( 'weights', 'colors', 'price' ) )->render();
        $returnPrice = view( 'partials.product_price', compact( 'price' ) )->render();

        return response()->json( array( 'success' => true, 'html' => $returnHTML, 'price' => $returnPrice ) );


    }

    public function locale( $lang )
    {
        if ( in_array( $lang, [ 'en', 'az', 'ru' ] ) ) {
            session( [ 'locale' => $lang ] );
        }

        return redirect()->back();

    }

    public function login()
    {
        return view( 'login' );
    }

    public function register()
    {
        return view( 'register' );
    }

    public function forgot_password()
    {
        return view( 'forgot_password' );
    }

    public function new_password()
    {
        return view( 'new_password' );
    }

    public function settings()
    {
        return view( 'settings' );
    }

    public function news()
    {
        return view( 'news' );
    }

    public function news_in()
    {
        return view( 'news_in' );
    }

    public function basket()
    {
        return view( 'basket' );
    }

    public function create_address()
    {
        return view( 'create_address' );
    }

    public function my_address()
    {
        return view( 'my_address' );
    }

    public function selected()
    {
        return view( 'selected' );
    }

    public function orders()
    {
        return view( 'orders' );
    }

    public function catalogs()
    {
        return view( 'catalogs' );
    }

    public function about()
    {
        return view( 'about' );
    }

    public function catalog_filter()
    {
        return view( 'catalog_filter' );
    }

    public function static()
    {
        return view( 'static' );
    }

    public function contact()
    {
        return view( 'contact' );
    }

    public function setView()
    {

        $cookie = cookie( 'view', \request()->input( 'view', 'grid' ) );
        return response()->json( [ 'status' => 'success' ] )->cookie( $cookie );
    }

    public function getProductsByCategoryId( $id )
    {
        return response()->json( [
                                     'data' => Product::query()->select( [ 'id', "name" ] )->where( 'category_id', $id )
                                                      ->get()->toArray()
                                 ] );
    }

    public function getConsumptionByProductId( $id )
    {
        $product = Product::query()
                          ->select( [ 'consumption_norm', 'recommended_layers', 'dimension_changeable' ] )
                          ->where( 'id', $id )
                          ->first();
        return response()->json( [
                                     'status' => 'success',
                                     'data'   => $product->only( [
                                                                     'consumption_norm',
                                                                     'recommended_layers',
                                                                     'dimension_changeable'
                                                                 ] )
                                 ] );
    }

    private function getFilters( $category )
    {
//        collect()->put('weights', )
        $filters = [];
        if ( !( $category instanceof Category ) ) {
            return null;
        }

        $f = Filter::query()
                   ->when( is_null( $category->category_id ), function ( Builder $query ) use ( $category ) {
                       $query->whereIntegerInRaw( 'category_id',
                                                  Category::query()
                                                          ->where( 'category_id', $category->id )
                                                          ->pluck( 'id' )->toArray() );
                   }, function ( Builder $query ) use ( $category ) {
                       $query->where( 'category_id', $category->id );
                   } )
                   ->when( \request()->filled( 'appearances' ), function ( Builder $query ) {
                       $query->whereIntegerInRaw( 'appearance_id', \request()->input( 'appearances' ) );
                   } )
                   ->when( \request()->filled( 'properties' ), function ( Builder $query ) {
                       $query->whereIntegerInRaw( 'property_id', \request()->input( 'properties' ) );
                   } )->get();

        $filters['refProperties'] = $f->pluck( 'property_id' )->unique()->toArray();
        $filters['appearances']   = $f->pluck( 'appearance_id' )->unique()->toArray();
        $filters['weights']       = $f->pluck( 'weight_id' )->unique()->toArray();
        $filters['brands']        = $f->pluck( 'brand_id' )->unique()->toArray();


        return $filters;
    }

    public function getFiltersApi( $categoryId = null, $return = false )
    {
        $category = null;
        if ( is_null( $categoryId ) ) {
            $categoryId = \request()->input( 'category_id' );
        }

        if ( !is_null( $categoryId ) ) {
            $category = Category::query()->where( 'id', $categoryId )->first();
        }

        $f = Filter::query()
                   ->when( isset( $category ), function ( Builder $query ) use ( $category ) {
                       $query->whereIntegerInRaw( 'category_id',
                                                  is_null( $category->category_id )
                                                      ?
                                                      Category::query()
                                                              ->where( 'category_id', $category->id )
                                                              ->pluck( 'id' )->toArray()
                                                      : [ $category->id ] );
                   } )
                   ->when( \request()->filled( 'appearances' ), function ( Builder $query ) {
                       $query->whereIntegerInRaw( 'appearance_id', \request()->input( 'appearances' ) );
                   } )
                   ->when( \request()->filled( 'brands' ), function ( Builder $query ) {
                       $query->whereIntegerInRaw( 'brand_id', \request()->input( 'brands' ) );
                   } )
                   ->when( \request()->filled( 'weights' ), function ( Builder $query ) {
                       $query->whereIntegerInRaw( 'weight_id', \request()->input( 'weights' ) );
                   } )
                   ->when( \request()->filled( 'properties' ), function ( Builder $query ) {
                       $query->whereIntegerInRaw( 'property_id', \request()->input( 'properties' ) );
                   } )->get();


        $filters['refProperties'] = [];
        $refProps                 = $f->pluck( 'property_id' )->unique()->toArray();
        foreach ( properties() as $property ) {
            if ( in_array( $property->id, $refProps ) ) {
                $filters['refProperties'][$property->id] = $property->name[app()->getlocale()];
            }
        }

        $filters['appearances'] = [];
        $appearances            = $f->pluck( 'appearance_id' )->unique()->toArray();
        foreach ( appearances() as $appearance ) {
            if ( in_array( $appearance->id, $appearances ) ) {
                $filters['appearances'][$appearance->id] = $appearance->name[app()->getlocale()];
            }
        }

        $filters['weights'] = [];
        $weights            = $f->pluck( 'weight_id' )->unique()->toArray();
        foreach ( weights() as $weight ) {
            if ( in_array( $weight->id, $weights ) ) {
                $filters['weights'][$weight->id] = $weight->weight . " " . productWeightUnit( $weight->weight_type );
            }
        }
        $filters['brands'] = [];
        $brands            = $f->pluck( 'brand_id' )->unique()->toArray();
        foreach ( brands() as $brand ) {
            if ( in_array( $brand->id, $brands ) ) {
                $filters['brands'][$brand->id] = $brand->name;
            }
        }


        if ( $return ) {
            return $filters;
        }

        return response()->json( [
                                     'data' => $filters,
                                 ] );


    }

    private function paginate( $items, $page = null, $perPage = 32, $options = [] )

    {

        $page = $page
            ?: ( Paginator::resolveCurrentPage()
                ?: 1 );

        $items = $items instanceof Collection
            ? $items
            : Collection::make( $items );

        return new LengthAwarePaginator( $items->forPage( $page, $perPage ), $items->count(), $perPage, $page, $options );

    }

    public function pages( $id )
    {
        $page = Page::query()
                  // ->where( 'active_status', true )
                    ->findOrFail( $id );
        return view( 'static_page', compact( 'page' ) );
    }
}


