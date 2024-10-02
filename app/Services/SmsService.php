<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SmsService
{
    private string $api;
    private string $login;
    private string $password;
    private string $sender;
    private string $balanceEndpoint;
    private string $smsSenderEndpoint;
    private string $msisdn;
    private string $msgBody;
    private string $scheduled = 'NOW';
    private bool $unicode = false;
    private array $json;

    public function __construct()
    {
        $this->api = config( 'lsim.api' );
        $this->login = config( 'lsim.login' );
        $this->password = config( 'lsim.password' );
        $this->sender = config( 'lsim.sender' );
        $this->balanceEndpoint = config( 'lsim.endpoints.balance' );
        $this->smsSenderEndpoint = config( 'lsim.endpoints.smssender' );
    }

    protected function key( string $msgBody = null, string $msisdn = null, string $sender = null ): string
    {
        return md5( md5( $this->password ) . $this->login . ( implode( '', func_get_args() ) ) );
    }


    public function send(): void
    {
        $this->json =  Http::post( $this->smsSenderEndpoint, [
            'login' => $this->login,
            'key' => $this->key($this->getMsgBody(), $this->getMsisdn(), $this->sender),
            'msisdn' => $this->getMsisdn(),
            'text' => $this->getMsgBody(),
            'sender' => $this->sender,
            'scheduled' => $this->getScheduled(),
            'unicode' => $this->isUnicode()
        ] )->json();

    }

    public function json(): array
    {
        return $this->json;
    }

    public function checkBalance()
    {
        $balance = Http::withQueryParameters(
            [
                'login' => $this->login,
                'key' => $this->key()
            ]
        )->get( $this->balanceEndpoint )->json( 'obj' );
        return $balance > 0;

    }

    private function getMsisdn(): string
    {
        return $this->msisdn;
    }


    public function setMsisdn( string $msisdn ): SmsService
    {
        $this->msisdn = $msisdn;
        return $this;
    }


    private function getMsgBody(): string
    {
        return $this->msgBody;
    }


    public function setMsgBody( string $msgBody ): SmsService
    {
        $this->msgBody = $msgBody;
        return $this;
    }


    private function getScheduled(): string
    {
        return $this->scheduled;
    }


    public function setScheduled( string $scheduled ): SmsService
    {
        $this->scheduled = $scheduled;
        return $this;
    }


    private function isUnicode(): bool
    {
        return $this->unicode;
    }


    public function setUnicode( bool $unicode ): SmsService
    {
        $this->unicode = $unicode;
        return $this;
    }


}