<?php

namespace KryptonPay\Api;

use stdClass;

class Token extends DefaultModel
{
    private $id;
    private $token;

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function setToken(string $token)
    {
        $this->token = $token;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getToken()
    {
        return $this->token;
    }
}

