<?php

namespace KryptonPay\Api;

class Split extends DefaultModel
{
    private $document;
    private $value = null;
    private $tax = null;

    public function setDocument(string $document)
    {
        $this->document = $document;
    }

    public function setValue(float $value)
    {
        $this->value = $value;
    }

    public function setTax(float $tax)
    {
        $this->tax = $tax;
    }

    public function getDocument()
    {
        return $this->document;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getTax()
    {
        return $this->tax;
    }
}
