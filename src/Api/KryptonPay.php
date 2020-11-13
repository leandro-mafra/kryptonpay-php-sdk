<?php

namespace KryptonPay\Api;

use KryptonPay\Service\Api\Client;
use KryptonPay\Service\Transaction\Module\CreditCard;
use KryptonPay\Service\Transaction\Module\SlipBank;

class KryptonPay
{
    public static function createPayment(ApiContext $apiContext)
    {
        $payment = null;
        switch ($apiContext->getTransaction()->getPaymentType()) {
            case ApiContext::SLIPBANK:
                $payment = new SlipBank($apiContext);
                break;
            case ApiContext::CREDIT_CARD:
                $payment = new CreditCard($apiContext);
                break;
        }

        $transaction = $payment->getDataTranform();
        $api = new Client($apiContext, 'POST', 'transactions');

        return $api->call($transaction);
    }

    public static function getTransaction(ApiContext $apiContext, int $Transaction)
    {
        $api = new Client($apiContext, 'GET', sprintf('transactions?referencia=%s', $Transaction));

        return $api->call();
    }

    public static function getId(ApiContext $apiContext, int $id)
    {
        $api = new Client($apiContext, 'GET', sprintf('transactions?id=%s', $id));

        return $api->call();
    }   

    public static function createAccount(ApiContext $apiContext, $data)
    {     
        $api    = new Client($apiContext, 'POST', 'users/openAccount');       

        return $api->call($data);
    }
}
