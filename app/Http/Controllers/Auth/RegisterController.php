<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Jobs\SendVerifyPhoneSmsJob;
use App\Models\PhoneVerification;
use App\Models\User;
use App\Rules\PhoneNumberRule;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends
    Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    public function showRegistrationForm()
    {
        return view( 'register' );
    }

    public function redirectTo()
    {
        return '/';
    }

    public function register( RegisterUserRequest $request )
    {
        $validated = $request->validated();

        event( new Registered( $user = $this->create( $validated ) ) );

        if ( $response = $this->registered( $request, $user ) ) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse( [], 201 )
            : redirect( $this->redirectPath() );
    }


    /**
     * Where to redirect users after registration.
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
        $this->middleware( 'guest' );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\Models\User
     */
    protected function create( array $data )
    {
        return User::create( [
                                 'full_name' => $data[ 'full_name' ],
                                 'email'     => $data[ 'email' ],
                                 'phone'     => $data[ 'phone' ],
                                 'password'  => Hash::make( $data[ 'password' ] ),
                             ] );
    }

    public function sendPhoneVerificationCode( RegisterUserRequest $request )
    {
        $phone = $request->validated( 'phone' );
        $phone = str_replace( [ '+', '(', ')', ' ' ], '', $phone );
        $phoneVerification = $this->getRetry( $phone, 2 );
        if ( !is_null( $phoneVerification ) ) {
            return response()->json(
                [
                    'status'  => 'fail',
                    'message' => __( 'You can\'t try now' )
                ]
            );
        }
        dispatch( new SendVerifyPhoneSmsJob( $phone ) );
        return response()->json(
            [
                'status' => 'success'
            ]
        );
    }

    public function verifyNumber()
    {
        $validated = Validator::make(
            \request()->all(),
            [
                'code' => ['required', 'array'],
                'code.*' => []
            ] );
        $codes = \request()->input( 'code' );
        $code = implode( '', $codes );
        if ()
    }

    private function getRetry( $phone, int $minutes )
    {
        $time = now()->subMinutes( $minutes )->format( 'Y-m-d H:i:s' );
        return PhoneVerification::query()
            ->where( 'phone', $phone )
            ->where( 'created_at', '>', $time )
            ->first();
    }
}
