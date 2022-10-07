<?php

namespace KryptonPay\Api;

class Pix extends DefaultModel
{
    private $value;
    private $payerRequest = null;
    private $calendar = null;

    public function setValue(float $value)
    {
        $this->value = $value;
    }

    public function setPayerRequest(string $payerRequest)
    {
        $this->payerRequest = $payerRequest;
    }

    public function setCalendar(Calendar $calendar)
    {
        $this->calendar = $calendar;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getPayerRequest()
    {
        return $this->payerRequest;
    }

    public function getCalendar()
    {
        return $this->calendar;
    }
}
