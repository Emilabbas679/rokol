<?php

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

Route::get('/', [SiteController::class, 'index'])->name('home');
Route::match(['get', 'post'],'/category/{category_id}', [SiteController::class, 'category'])->name('category');
Route::match(['get', 'post'],'/products', [SiteController::class, 'category'])->name('products');
Route::post('/get/sub-categories', [SiteController::class, 'getSubCategories'])->name('getSubCategories');
Route::get('/product/{product_id}', [SiteController::class, 'product'])->name('product');
Route::post('/product/price/{product_id}', [SiteController::class, 'productPrice'])->name('product_price');
Route::get('/lang/{locale}', [SiteController::class, 'locale'])->name('locale');

