<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Middleware\RedirectIfFrontUserAuthenticated;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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



    public function showLoginForm()
    {
        return view('login');
    }

    public function username()
    {
        return \request()->filled('email') ? 'email' : 'phone';
    }

    public function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string'.($this->username() == 'email' ? '|email': '') ,
            'password' => 'required|string|min:8|max:20',
        ]);
    }


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
        $this->middleware(RedirectIfFrontUserAuthenticated::class)->except('logout');
        $this->middleware('auth')->only('logout');
    }
}
