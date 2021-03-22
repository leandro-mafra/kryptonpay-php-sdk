<?php

namespace KryptonPay\Service\Register;

use KryptonPay\Api\ApiContext;
use KryptonPay\Api\KryptonPay;

class PersonRegister
{
    protected $apiContext;
    protected $kryptonPay;

    public function __construct(ApiContext $apiContext)
    {
        $this->apiContext  = $apiContext;
        $this->kryptonPay  = new KryptonPay();
    }    

    public function createPerson($accountPessoa)
    {
        return $this->kryptonPay->createPerson($this->apiContext, $accountPessoa);
    }

    public function allPersons()
    {
        return $this->kryptonPay->allPersons($this->apiContext);
    }
}
