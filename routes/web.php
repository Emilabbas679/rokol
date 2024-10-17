<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SettingController;
use App\Http\Middleware\AuthenticateFrontUser;
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

Auth::routes(['reset' => false]);

Route::get('/', [SiteController::class, 'index'])->name('home');
Route::match(['get', 'post'],'/category/{category_id}', [SiteController::class, 'category'])->name('category');
Route::match(['get', 'post'],'/products', [SiteController::class, 'category'])->name('products');
Route::post('/get/sub-categories', [SiteController::class, 'getSubCategories'])->name('getSubCategories');
Route::get('/product/{product_id}', [SiteController::class, 'product'])->name('product');
Route::post('/product/price/{product_id}', [SiteController::class, 'productPrice'])->name('product_price');
Route::get('/lang/{locale}', [SiteController::class, 'locale'])->name('locale');
Route::post('/phone/send-code', [RegisterController::class, 'sendPhoneVerificationCode'])->name('phone.send_code');
Route::post('/phone/verify', [RegisterController::class, 'verifyNumber'])->name('phone.verify');

//Route::get('/login', [SiteController::class, 'login'])->name('login');
//Route::get('/register', [SiteController::class, 'register'])->name('register');
Route::middleware([AuthenticateFrontUser::class])->group(function () {
    Route::prefix("/carts")->name('carts.')->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('index')->withoutMiddleware([AuthenticateFrontUser::class]);
        Route::post('add', [CartController::class, 'addProduct'])->name('add')->withoutMiddleware([AuthenticateFrontUser::class]);
        Route::get('address', [CartController::class, 'selectAddress'])->name('address');
        Route::delete('{id}', [CartController::class, 'destroy'])->name('destroy');
        Route::post('complete', [CartController::class, 'completeCart'])->name('complete');
    });
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::resource('addresses', AddressController::class)->except(['create', 'edit']);
    Route::get('/settings', [SettingController::class, 'edit'])->name('settings.edit');
    Route::put('/settings/update', [SettingController::class, 'update'])->name('settings.update');
    Route::resource('favorites', FavoriteController::class);
});

Route::get('/password/phone', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.phone');
Route::post('/password/code', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendPhoneCode'])->name('password.code.send');
Route::post('/password/code/verify', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'verifyPhoneCode'])->name('password.code.verify');
Route::get('/password/reset', [\App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset.page');
Route::post('/password/reset', [\App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('password.reset.do');
Route::delete('/carts/session/delete/{id}', [CartController::class, 'deleteFromSessionByProductId'])->name('carts.session.delete');
Route::get('/new_password', [SiteController::class, 'new_password'])->name('new_password');
//Route::get('/settings', [SiteController::class, 'settings'])->name('settings');
Route::get('/news', [\App\Http\Controllers\NewsController::class, 'index'])->name('news.index');
Route::get('/news/{id}', [\App\Http\Controllers\NewsController::class, 'show'])->name('news.show');
Route::get('/news_in', [SiteController::class, 'news_in'])->name('news_in');
Route::get('/create_address', [SiteController::class, 'create_address'])->name('create_address');
Route::get('/my_address', [SiteController::class, 'my_address'])->name('my_address');
Route::get('/selected', [SiteController::class, 'selected'])->name('selected');
Route::get('/colors', [\App\Http\Controllers\ColorController::class, 'index'])->name('colors');
Route::get('/about', [\App\Http\Controllers\AboutController::class, 'index'])->name('about');
Route::get('/static', [SiteController::class, 'static'])->name('static');
Route::get('/contact', [SiteController::class, 'contact'])->name('contact');
Route::post('/messages', [\App\Http\Controllers\MessageController::class, 'store'])->name('messages.store');
Route::get('/catalog', [\App\Http\Controllers\CatalogController::class, 'index'])->name('catalogs.index');
Route::get('/view', [\App\Http\Controllers\SiteController::class, 'setView'])->name('view.set');

Route::get('/offers', function(){
    return view('offers');
})->name('offers.index');

