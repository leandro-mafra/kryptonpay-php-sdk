<?php

namespace KryptonPay\Api;

class Slip extends DefaultModel
{
    private $value;
    private $discountValue = null;
    private $discountLimitDate = null;
    private $observations = [];
    private $instruction;
    private $penaltyRate;
    private $penaltyDate;
    private $interestRate;
    private $dueDate;

    public function setValue(float $value)
    {
        $this->value = $value;
    }

    public function setDiscountValue(float $discountValue)
    {
        $this->discountValue = $discountValue;
    }

    public function setDiscountLimitDate(string $discountLimitDate)
    {
        $this->discountLimitDate = $discountLimitDate;
    }

    public function addObservation(string $observation)
    {
        $this->observations[] = $observation;
    }

    public function setInstruction(string $instruction)
    {
        $this->instruction = $instruction;
    }

    public function setPenaltyRate(float $penaltyRate)
    {
        $this->penaltyRate = $penaltyRate;
    }

    public function setPenaltyDate(float $penaltyDate)
    {
        $this->penaltyDate = $penaltyDate;
    }

    public function setInterestRate(float $interestRate)
    {
        $this->interestRate = $interestRate;
    }

    public function setDueDate(string $dueDate)
    {
        $this->dueDate = $dueDate;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getDiscountValue()
    {
        return $this->discountValue;
    }

    public function getDiscountLimitDate()
    {
        return $this->discountLimitDate;
    }

    public function getObservation()
    {
        return $this->observations;
    }

    public function getInstruction()
    {
        return $this->instruction;
    }

    public function getPenaltyRate()
    {
        return $this->penaltyRate;
    }

    public function getPenaltyDate()
    {
        return $this->penaltyDate;
    }

    public function getInterestRate()
    {
        return $this->interestRate;
    }

    public function getDueDate()
    {
        return $this->dueDate;
    }
}
