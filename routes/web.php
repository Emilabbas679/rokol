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
Route::get('/category/{category_id}', [SiteController::class, 'category'])->name('category');
Route::get('/product/{product_id}', [SiteController::class, 'product'])->name('product');
Route::get('/lang/{locale}', [SiteController::class, 'locale'])->name('locale');

