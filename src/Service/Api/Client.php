<?php

namespace KryptonPay\Api;

class Client
{
    public static function createPayment(ApiContext $apiContext)
    {
        $slipBankRepo = new CreditCard($data);
        $transaction = $slipBankRepo->getData();

        $api = new Api($this->settings, 'POST', 'transactions');
        return $api->send($transaction);


        $response = Client::HttpClient('GET', 'MerchantPaymentMethod/List', null, false);
        return $response;
    }
}
