<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\PhoneNumberRule;
use App\Services\SmsService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    public function __construct( private SmsService $smsService )
    {
    }

    public function showLinkRequestForm()
    {
        return view( 'forgot_password' );
    }

    public function sendPhoneCode( Request $request )
    {
        $validated = Validator::make( $request->all(), [
            'phone' => [ 'required', 'string', new PhoneNumberRule(), Rule::exists( User::class, 'phone' ) ]
        ] )->validated();

        if ( $this->codeAlreadySent( $validated['phone'] ) ) {
            return response()->json( [ 'status' => 'failed', 'message' => __( 'You can try after 1 minute' ) ] );
        }

        $user = User::query()
                    ->where( 'phone', $validated['phone'] )
                    ->first();

        $this->sendCode( $user );

        return response()->json( [ 'status' => 'success' ] );

    }

    private function codeAlreadySent( $phone )
    {
        return User::query()
                   ->where( 'phone', $phone )
                   ->where( 'forgot_password_sent_at', '>', now()->subMinutes( 2 )->format( 'Y-m-d H:i:s' ) )
                   ->exists();

    }

    private function sendCode( Model $user )
    {
        $phoneVerificationCode = rand( 1000, 9999 );
        $phone                 = str_replace( [ '+', '(', ')', ' ' ], '', $user->phone );
        $this->smsService
            ->setMsgBody( __( 'Təsdiqləmə kodu: ' . $phoneVerificationCode ) )
            ->setMsisdn( $phone )
            ->send();

        if ( empty( $this->smsService->json()['errorCode'] ) ) {

            $user->update( [
                               'phone_verify_code'       => $phoneVerificationCode,
                               'forgot_password_sent_at' => now()->format( 'Y-m-d H:i:s' )
                           ] );

        }
    }


    public function verifyPhoneCode( Request $request )
    {
        $validated = Validator::make( \request()->all(), [
            'code'   => [ 'required', 'array', 'min:4', 'max:4' ],
            'code.*' => [ 'required', 'numeric', 'digits:1' ],
            'phone'  => [ 'required', 'string', new PhoneNumberRule(), Rule::exists( User::class, 'phone' ) ]
        ] )->validated();
        $codes     = $validated['code'];
        $phone     = $validated['phone'];
        $code      = implode( '', $codes );
        $user      = User::query()
                         ->where( 'phone', $phone )
                         ->where( 'phone_verify_code', $code )
                         ->where( 'forgot_password_sent_at', '>', now()->subMinutes( 10 )
                                                                       ->format( 'Y-m-d H:i:s' ) )
                         ->first();
        if ( is_null( $user ) ) {
            return response()->json( [
                                         'status'  => 'fail',
                                         'message' => 'Given code is incorrect'
                                     ] );
        }
        $token = md5( Str::random( 32 ) );
        $user->update( [
                           'phone_verify_code'       => null,
                           'forgot_password_sent_at' => null,
                           'forgot_password_token'   => $token
                       ] );
        session()->put( 'forgot_password_token', $token );
        return response()->json( [ 'status' => 'success' ] );
    }


}
