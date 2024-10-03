<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Jobs\SendVerifyPhoneSmsJob;
use App\Models\PhoneVerification;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    use RegistersUsers;


    protected $redirectTo = '/';


    public function __construct()
    {
        $this->middleware( 'guest' );
    }


    public function showRegistrationForm()
    {
        return view( 'register' );
    }

    public function redirectTo()
    {
        return '/';
    }

    public function register( RegisterUserRequest $request ): JsonResponse
    {
        $validated = $request->validated();
        $phone = str_replace( [ '+', '(', ')', ' ' ], '', $validated['phone'] );
        $phoneVerification = PhoneVerification::query()
            ->where( 'phone', $phone )
            ->where('verified', true)
            ->first();

        if (is_null($phoneVerification)) {
            return response()
                ->json([
                    'status' => 'fail'
                ]);
        }

        event( new Registered( $user = $this->create( $validated ) ) );

        if ( $response = $this->registered( $request, $user ) ) {
            return $response;
        }

        $phoneVerification->delete();

        return new JsonResponse( [
            'status'  => 'success',
            'message' => 'User created successfully.'
        ], 201 );
    }


    protected function create( array $data ): User
    {
        return User::create( [
            'full_name' => $data[ 'full_name' ],
            'email'     => $data[ 'email' ],
            'phone'     => $data[ 'phone' ],
            'password'  => Hash::make( $data[ 'password' ] )
        ] );
    }

    public function sendPhoneVerificationCode( RegisterUserRequest $request )
    {
        $phone = $request->validated( 'phone' );
        $phone = str_replace( [ '+', '(', ')', ' ' ], '', $phone );
        $phoneVerification = $this->getRetry( $phone, 2 );
        if ( !is_null( $phoneVerification ) ) {
            return response()->json( [
                'status' => 'fail', 'message' => __( 'You can\'t try now' )
            ] );
        }
        dispatch( new SendVerifyPhoneSmsJob( $phone ) );
        return response()->json( [
            'status' => 'success'
        ] );
    }

    public function verifyNumber( RegisterUserRequest $request )
    {
        $codes = Validator::make( \request()->all(), [
            'code'   => [ 'required', 'array', 'min:4', 'max:4' ],
            'code.*' => [ 'required', 'numeric', 'digits:1' ]
        ] )->validated()[ 'code' ];
        $phone = $request->validated( 'phone' );
        $phone = str_replace( [ '+', '(', ')', ' ' ], '', $phone );
        $code = implode( '', $codes );
        $phoneValidation = PhoneVerification::query()
            ->where( 'phone', $phone )
            ->where( 'code', $code )
            ->where( 'created_at', '>', now()->subMinutes( 10 )->format( 'Y-m-d H:i:s' ) )
            ->where( 'verified', false )
            ->first();
        if ( is_null( $phoneValidation ) ) {
            return response()->json( [
                'status'  => 'fail',
                'message' => 'Given code is incorrect'
            ] );
        }
        $phoneValidation->update( [
            'verified' => true
        ] );
        return response()->json( [
            'status'  => 'success',
            'message' => __( 'Telefon nömrəsi uğurla təsdiqləndi' )
        ] );
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
