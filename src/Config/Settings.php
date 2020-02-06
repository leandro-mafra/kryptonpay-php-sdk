<?php namespace KryptonPay\Config;

class Settings
{
    public $token;
    public $environment;
    public $url;

    public function __construct(string $token , string $environment)
    {
        $this->token = $token;
        $this->environment = $environment;
        $this->url = ($this->environment == 'P') ? 'https://api.kryptonpay.com.br' : 'http://gateway-api-local';
    }

}
