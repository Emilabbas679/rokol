<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/';

    public function showResetForm( Request $request )
    {
        if ( !session()->has( 'forgot_password_token' ) ) {
            return redirect()->route( 'home' );
        }
        return view( 'new_password' );
    }

    public function reset( Request $request )
    {
        $request->validate( $this->rules(), $this->validationErrorMessages() );

        if ( !session()->has( 'forgot_password_token' ) ) {
            return redirect()->route( 'home' );
        }

        $user = User::query()
                    ->where( 'forgot_password_token', session()->get( 'forgot_password_token' ) )
                    ->first();

        $user->update( [
                           'password'              => Hash::make( $request->input( 'password' ) ),
                           'forgot_password_token' => null
                       ] );


        session()->forget( 'forgot_password_token' );

        return redirect()->route('home');
    }


    protected function rules()
    {
        return [
            'password' => [ 'required', 'confirmed', 'string', 'min:8' ],
        ];
    }


}
