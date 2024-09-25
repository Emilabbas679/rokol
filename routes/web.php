<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/', [SiteController::class, 'index'])->name('home');
Route::match(['get', 'post'],'/category/{category_id}', [SiteController::class, 'category'])->name('category');
Route::match(['get', 'post'],'/products', [SiteController::class, 'category'])->name('products');
Route::post('/get/sub-categories', [SiteController::class, 'getSubCategories'])->name('getSubCategories');
Route::get('/product/{product_id}', [SiteController::class, 'product'])->name('product');
Route::post('/product/price/{product_id}', [SiteController::class, 'productPrice'])->name('product_price');
Route::get('/lang/{locale}', [SiteController::class, 'locale'])->name('locale');

//Route::get('/login', [SiteController::class, 'login'])->name('login');
//Route::get('/register', [SiteController::class, 'register'])->name('register');
Route::get('/forgot_password', [SiteController::class, 'forgot_password'])->name('forgot_password');
Route::get('/new_password', [SiteController::class, 'new_password'])->name('new_password');
Route::get('/settings', [SiteController::class, 'settings'])->name('settings');
Route::get('/news', [SiteController::class, 'news'])->name('news');
Route::get('/news_in', [SiteController::class, 'news_in'])->name('news_in');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/create_address', [SiteController::class, 'create_address'])->name('create_address');
Route::get('/my_address', [SiteController::class, 'my_address'])->name('my_address');
Route::get('/selected', [SiteController::class, 'selected'])->name('selected');
Route::get('/orders', [SiteController::class, 'orders'])->name('orders');
Route::get('/about', [SiteController::class, 'about'])->name('about');
Route::get('/static', [SiteController::class, 'static'])->name('static');
Route::get('/contact', [SiteController::class, 'contact'])->name('contact');


