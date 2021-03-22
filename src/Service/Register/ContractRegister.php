<?php

namespace KryptonPay\Service\Register;

use KryptonPay\Api\User;
use KryptonPay\Api\ApiContext;
use KryptonPay\Api\KryptonPay;

class ContractRegister
{
    protected $apiContext;
    protected $kryptonPay;

    public function __construct(ApiContext $apiContext)
    {
        $this->apiContext = $apiContext;
        $this->kryptonPay = new KryptonPay();
    }

    public function createContract($dataContrato)
    {
        return $this->kryptonPay->createContract($this->apiContext, $dataContrato);
    }

    public function updateContract($dataContrato)
    {
        return $this->kryptonPay->updateContract($this->apiContext, $dataContrato);
    }

    public function getContract($idContrato)
    {
        return $this->kryptonPay->getContract($this->apiContext, $idContrato);
    }

    public function allContracts()
    {
        return $this->kryptonPay->allContracts($this->apiContext);
    }
}
