<?php

namespace App\Jobs;

use App\Models\PhoneVerification;
use App\Models\User;
use App\Services\SmsService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class SendVerifyPhoneSmsJob implements
    ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    /**
     * Create a new job instance.
     */
    public function __construct(
        private string     $phone,
        private SmsService $smsService = new SmsService()
    )
    {

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $phoneVerificationCode = rand( 1000, 9999 );
        $this->smsService
            ->setMsgBody( __( 'Təsdiqləmə kodu: ' . $phoneVerificationCode ) )
            ->setMsisdn( $this->phone )
            ->send();

        if ( empty( $this->smsService->json()[ 'errorCode' ] ) ) {
            PhoneVerification::query()
                ->updateOrCreate(
                    [
                        'phone' => $this->phone
                    ],
                    [
                        'code'       => $phoneVerificationCode,
                        'created_at' => now(),
                        'verified'   => false
                    ]
                );
        }
    }

}
