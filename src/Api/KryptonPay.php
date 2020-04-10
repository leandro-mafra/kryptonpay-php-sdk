<?php

namespace KryptonPay\Api;

use KryptonPay\Service\Transaction\Module\CreditCard;
use KryptonPay\Service\Api\Api;

class KryptonPay
{
    public static function createPayment(ApiContext $apiContext)
    {
        $creditCard = new CreditCard($apiContext);
        $transaction = $creditCard->getDataTranform();

        $api = new Api($apiContext, $transaction, 'POST', 'transactions');
        return $api->call($transaction);
    }
}
