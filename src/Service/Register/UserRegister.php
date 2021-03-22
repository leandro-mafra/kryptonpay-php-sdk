<?php

namespace KryptonPay\Service\Register;

use KryptonPay\Api\User;
use KryptonPay\Api\ApiContext;
use KryptonPay\Api\KryptonPay;

class UserRegister
{
    protected $apiContext;
    protected $kryptonPay;

    public function __construct(ApiContext $apiContext)
    {
        $this->apiContext = $apiContext;
        $this->kryptonPay = new KryptonPay();
    }

    public function createUser($dataContrato)
    {
        return $this->kryptonPay->createUser($this->apiContext, $dataContrato);
    }

    public function updateUser($dataContrato)
    {
        return $this->kryptonPay->updateUser($this->apiContext, $dataContrato);
    }

//    public function deleteUser($id)
//    {
//        return $this->kryptonPay->deleteUser($this->apiContext, $id);
//    }

    public function getUserbyId($id)
    {
        return $this->kryptonPay->getUserbyId($this->apiContext, $id);
    }

    public function getUserAll()
    {
        return $this->kryptonPay->getUserAll($this->apiContext);
    }
}
