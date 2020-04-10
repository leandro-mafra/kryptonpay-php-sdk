<?php

namespace KryptonPay\Api;

use KryptonPay\Service\Transaction\Module\CreditCard;
use KryptonPay\Service\Api\Client;

class KryptonPay
{
    public static function createPayment(ApiContext $apiContext)
    {
        $creditCard = new CreditCard($apiContext);
        $transaction = $creditCard->getDataTranform();
        $api = new Client($apiContext, 'POST', 'transactions');
        return $api->call($transaction);
    }

    public static function getTransaction(ApiContext $apiContext, int $idTransaction)
    {
        $api = new Client($apiContext, 'GET', sprintf('transactions?referencia=%s', $idTransaction));
        return $api->call();
    }
}
