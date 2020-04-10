<?php

namespace KryptonPay\Service\Transaction\Module;

use KryptonPay\Api\ApiContext;
use KryptonPay\Service\Transaction\Transaction;

class DebitCard extends Transaction
{
    public function __construct(ApiContext $apiContext)
    {
        parent::__construct($apiContext);
    }
}
