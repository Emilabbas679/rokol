<?php

namespace App\Console\Commands;

use App\Services\SmsService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class Test extends
    Command
{
    private SmsService $smsService;
    protected $signature = 'app:test';
    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
        $this->smsService = new SmsService();
    }


    public function handle()
    {
        $this->smsService->setMsisdn( '99470348421483' )->setMsgBody( "salam :: salam" )->send();
        dd( $this->smsService->json() );
    }

}
