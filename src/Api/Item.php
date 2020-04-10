<?php

namespace KryptonPay\Api;

use KryptonPay\Models\DefaultModel;

class Item extends DefaultModel
{
    private $code;
    private $description;
    private $unitPrice;
    private $quantity;

    public function setCode(string $code)
    {
        $this->code = $code;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    public function setUnitPrice(float $unitPrice)
    {
        $this->unitPrice = $unitPrice;
    }

    public function setQuantity(int $quantity)
    {
        $this->quantity = $quantity;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }
}
