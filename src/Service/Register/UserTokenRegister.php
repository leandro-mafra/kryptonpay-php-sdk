<?php

namespace KryptonPay\Service\Register;

use KryptonPay\Api\User;
use KryptonPay\Api\ApiContext;
use KryptonPay\Api\KryptonPay;

class UserTokenRegister
{
    protected $apiContext;
    protected $kryptonPay;
    protected $person;

    public function __construct(ApiContext $apiContext)
    {
        $this->apiContext = $apiContext;
        $this->kryptonPay = new KryptonPay();
        $this->person     = new User();
    }

    public function createToken($id)
    {
        return $this->kryptonPay->createToken($this->apiContext, $id);
    }

    public function updateToken($data)
    {
        return $this->kryptonPay->updateToken($this->apiContext, $data);
    }

    public function deleteToken($data)
    {
        return $this->kryptonPay->deleteToken($this->apiContext, $data);
    }

    public function getToken($id)
    {
        return $this->kryptonPay->getToken($this->apiContext, $id);
    }
}
