<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Blog;
use App\Models\ProductPrice;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;

class SiteController extends Controller
{
    public function index()
    {

        return view('index');
    }


    public function getSubCategories(Request $request)
    {
        $id = $request->id ?? 0;
        $category_id = $request->category_id ?? 0;
        $subs = Category::where('status', 1)->where('category_id', $id)->get();
        $html = '';
        $html .= "<option value='".$id."'>".translate('all').'</option>';
        foreach ($subs as $item) {

            $selected = '';
            if ($item->id == $category_id)
                $selected = 'selected';
            $html .= '<option value="'.$item->id.'" '.$selected.' >'.$item->name[app()->getLocale()] ?? ''.'</option>';
        }

        return response()->json([
            'status' => true,
            'html'=> $html
        ]);

    }

    public function category(Request $request,$id=0)
    {
        $categories = Cache::rememberForever('main_categories', function () {
            return $categories = Category::where('status',1)->where('category_id', null)->get();
        });

        if ($id == 0) {
            $category_ids = [];
            $category = [
                'name' => [app()->getLocale() => translate('products')],
                'id' => 0,
                'category_id' => 0
            ];
        }
        else{
            $category = Category::where('status', 1)->where('id', $id)->firstorfail();


            $sub_category_ids = Cache::rememberForever("sub_categories:".$id, function () use ($id)  {
                $sub_categories = Category::where('status', 1)->where('category_id', $id)->select('id', 'status', 'category_id')->get()->toArray();
                $sub_category_ids = array_column($sub_categories, 'id');
                return $sub_category_ids;
            });
            $category_ids = $sub_category_ids;
            $category_ids[] = $id;
        }



        $offset = 0;
        $limit = 20;
        if ($request->ajax()) {
            if ($request->has('page')) {
                $page = (int) $request->page;
                $offset = $page * $limit;
            }
        }

        $selected = [];
        $selected['min_price'] = $minPrice = 0;
        $selected['max_price'] = $maxPrice = 10000;

        if ($request->has('min_price') and ((int) $request->min_price) > 0)
            $selected['min_price'] = $minPrice = (int) $request->min_price;
        if ($request->has('max_price') and ((int) $request->max_price) <= 10000)
            $selected['max_price'] = $maxPrice = (int) $request->max_price;



        $query = Product::select('id', 'status', 'category_id', 'image','name')
            ->where('status', 1);

        if ($category['id'] != 0) {
            $query->whereIn('category_id', $category_ids);
        }
        if ($request->has('min_price') || $request->has('max_price')) {
            $query->whereHas('prices', function ($query) use ($minPrice, $maxPrice) {
                $query->where(function ($query) use ($minPrice, $maxPrice) {
                    $query->where(function ($query) use ($minPrice) {
                        $query->where('price', '>=', $minPrice)
                            ->orWhere('sale_price', '>=', $minPrice);
                    })->where(function ($query) use ($maxPrice) {
                        $query->where('price', '<=', $maxPrice)
                            ->orWhere('sale_price', '<=', $maxPrice);
                    });
                });
            });
        }
        if ($request->has('properties')) {
            if (is_array($request->properties)) {
                $selected['properties'] = $request->properties;
                $query->whereHas('refProperties', function ($query) use ($selected) {
                    $query->whereIn('property_id', $selected['properties']);
                });
            }
        }
        if ($request->has('types')) {
            if (is_array($request->types)) {
                $selected['types'] = $request->types;
                $query->whereHas('types', function ($query) use ($selected) {
                    $query->whereIn('type_id', $selected['types']);
                });
            }
        }
        if ($request->has('applicationAreas')) {
            if (is_array($request->applicationAreas)) {
                $selected['applicationAreas'] = $request->applicationAreas;
                $query->whereHas('applicationAreas', function ($query) use ($selected) {
                    $query->whereIn('application_area_id', $selected['applicationAreas']);
                });
            }
        }
        if ($request->has('appearances')) {
            if (is_array($request->appearances)) {
                $selected['appearances'] = $request->appearances;
                $query->whereHas('appearances', function ($query) use ($selected) {
                    $query->whereIn('appearance_id', $selected['appearances']);
                });
            }
        }
        if ($request->has('weights')) {
            if (is_array($request->weights)) {
                $selected['weights'] = $request->weights;
                $query->whereHas('prices', function ($query) use ($selected) {
                    $query->whereIn('weight_id', $selected['weights']);
                });
            }
        }
        $products = $query->limit($limit)->offset($offset)->get();


        if ($request->ajax()) {
            return response()->json([
                'status' => 1,
                'html' =>  view('partials.products', compact('products'))->render(),
                'count' => count($products)
            ]);
        }


        return view('category', compact('category', 'categories', 'products', 'selected'));
    }

    public function product(Request $request,$id)
    {
        $product = Product::where('id', $id)->where('status', 1)->with('category', 'prices','types', 'appearances','refProperties', 'applicationAreas')->firstorfail();
        $locale = app()->getLocale();
        $product->name = $product->name[$locale] ?? '';
        $product->about = $product->about[$locale] ?? '';
        $product->usage = $product->usage[$locale] ?? '';
        $product->advantage = $product->advantage[$locale] ?? '';
        $product->properties = $product->properties[$locale] ?? '';
        $product->consumption = $product->consumption[$locale] ?? '';
        $product->retention = $product->retention[$locale] ?? '';
        $product->warning = $product->warning[$locale] ?? '';
        $product->guarantee = $product->guarantee[$locale] ?? '';
        $product->apply = $product->apply[$locale] ?? '';
        $product->usage_rules = $product->usage_rules[$locale] ?? '';
        $color_id = 0; $weight_id = 0;
        $colors = [];
        $weights = [];
        if ($request->has('color') and ( (int)  $request->color) != 0)
            $color_id = (int) $request->color;
        if ($request->has('weight') and ( (int)  $request->weight) != 0)
            $weight_id = (int)  $request->weight;
        if ($color_id != 0 or $weight_id != 0) {
            $prices = ProductPrice::where('product_id', $product->id)
                ->when($color_id != 0, function ($query) use ($color_id) {
                    $query->where('color_id', $color_id);
                })
                ->when($weight_id != 0, function ($query) use ($weight_id) {
                    $query->where('weight_id', $weight_id);
                })->get();
        }
        else
            $prices = $product->prices ?? [];


        foreach ($product->prices as $item)
        {
            if (!isset($item[$item['color_id']]))
                $colors[$item->color_id] = $item;
        }




        $price = $prices[0] ?? [];
        if (isset($price['color_id'])) {
            $price_weights = ProductPrice::where('product_id', $product->id)->where('color_id', $price->color_id)->get();
            foreach ($price_weights as $item) {
                if (!isset($weights[$item->weight_id]))
                    $weights[$item->weight_id] = $item;
            }
        }


        return view('detail', compact('product', 'price', 'colors', 'weights'));
    }

    public function productPrice(Request $request, $product_id)
    {
        $product = Product::where('id', $product_id)->with('prices')->firstorfail();
        $color_id = 0; $weight_id = 0;
        $colors = [];
        $weights = [];
        if ($request->has('color_id') and ( (int)  $request->color_id) != 0)
            $color_id = (int) $request->color_id;
        if ($request->has('weight_id') and ( (int)  $request->weight_id) != 0)
            $weight_id = (int)  $request->weight_id;
        if ($color_id != 0 or $weight_id != 0) {
            $prices = ProductPrice::where('product_id', $product->id)
                ->when($color_id != 0, function ($query) use ($color_id) {
                    $query->where('color_id', $color_id);
                })
                ->when($weight_id != 0, function ($query) use ($weight_id) {
                    $query->where('weight_id', $weight_id);
                })->get();
        }
        else
            $prices = $product->prices ?? [];

        foreach ($prices as $item) {
            if (!isset($weights[$item->weight_id]))
                $weights[$item->weight_id] = $item;
        }
        foreach ($product->prices as $item)
        {
            if (!isset($item[$item['color_id']]))
                $colors[$item->color_id] = $item;
        }
        $price = $prices[0] ?? [];
        $returnHTML = view('partials.product_color_weights', compact('weights', 'colors', 'price'))->render();
        $returnPrice = view('partials.product_price', compact( 'price'))->render();

        return response()->json(array('success' => true, 'html'=>$returnHTML, 'price' => $returnPrice));


    }

    public function locale($lang)
    {
        if (in_array($lang, ['en', 'az', 'ru'])) {
            session(['locale' => $lang]);
        }

        return redirect()->back();

    }

    public function login()
    {
        return view('login');
    }
    public function register()
    {
        return view('register');
    }
    public function forgot_password()
    {
        return view('forgot_password');
    }
    public function new_password()
    {
        return view('new_password');
    }
    public function settings()
    {
        return view('settings');
    }
    public function news()
    {
        return view('news');
    }
    public function news_in()
    {
        return view('news_in');
    }
    public function basket()
    {
        return view('basket');
    }
    public function create_address()
    {
        return view('create_address');
    }
    public function my_address()
    {
        return view('my_address');
    }
    public function selected()
    {
        return view('selected');
    }
    public function orders()
    {
        return view('orders');
    }
    public function catalogs()
    {
        return view('catalogs');
    }
    public function about()
    {
        return view('about');
    }
    public function static()
    {
        return view('static');
    }
    public function contact()
    {
        return view('contact');
    }
}


