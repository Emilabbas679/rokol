<?php

namespace App\Jobs;

use App\Models\User;
use App\Services\SmsService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class SmsJob implements
    ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    /**
     * Create a new job instance.
     */
    public function __construct(
        private User       $user,
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

    }

}
