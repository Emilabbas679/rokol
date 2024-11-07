<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Middleware\RedirectIfFrontUserAuthenticated;
use App\Models\Cart;
use App\Models\ProductPrice;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware( RedirectIfFrontUserAuthenticated::class )->except( 'logout' );
        $this->middleware( 'auth' )->only( 'logout' );
    }


    public function showLoginForm()
    {
        return view( 'login' );
    }

    public function username()
    {
        return \request()->filled( 'email' )
            ? 'email'
            : 'phone';
    }

    public function validateLogin( Request $request )
    {
        $request->validate( [
                                $this->username() => 'required|string' . ( $this->username() == 'email'
                                        ? '|email'
                                        : '' ),
                                'password'        => 'required|string|min:8|max:20',
                            ] );
    }

    public function login( Request $request )
    {
        $this->validateLogin( $request );

        if ( method_exists( $this, 'hasTooManyLoginAttempts' ) &&
            $this->hasTooManyLoginAttempts( $request ) ) {
            $this->fireLockoutEvent( $request );

            return $this->sendLockoutResponse( $request );
        }

        if ( $this->attemptLogin( $request ) ) {
            if ( $request->hasSession() ) {
                $request->session()->put( 'auth.password_confirmed_at', time() );
            }

            $this->cookieProductsToCart();
            $cookie = Cookie::forget( 'carts' );
            $request->session()->regenerate();

            $this->clearLoginAttempts( $request );

            if ( $response = $this->authenticated( $request, $this->guard()->user() ) ) {
                return $response;
            }

            return redirect()->intended( $this->redirectPath() )->cookie( $cookie );
        }

        $this->incrementLoginAttempts( $request );

        return $this->sendFailedLoginResponse( $request );
    }

    private function cookieProductsToCart(): void
    {
        $cookieCarts = \request()->cookie( 'carts' );
        if ( is_null( $cookieCarts ) ) {
            return;
        }
        if ( is_string( $cookieCarts ) ) {
            $cookieCarts = collect( json_decode( $cookieCarts, true ) );
        }
        foreach ( $cookieCarts as $key => $value ) {
            $productId = $key;
            foreach ( $value as $val ) {
                $productPriceId = $val['product_price_id'];
                $colorId        = $val['color_id'];
                $count          = $val['count'];
                Cart::query()->updateOrCreate( [
                                                   'user_id'          => fUserId(),
                                                   'product_id'       => $productId,
                                                   'color_id'         => $colorId,
                                                   'product_price_id' => $productPriceId,
                                                   'status'           => Cart::STATUS_UNCOMPLETED
                                               ],
                                               [
                                                   'count' => DB::raw( 'count + ' . $count ),
                                               ] );
            }

        }


    }


}
