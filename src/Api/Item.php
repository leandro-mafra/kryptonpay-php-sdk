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
        $this->code;
    }

    public function getDescription()
    {
        $this->description;
    }

    public function getUnitPrice()
    {
        $this->unitPrice;
    }

    public function getQuantity()
    {
        $this->quantity;
    }
}
