<?php

namespace KryptonPay\Api;

class CreditCard extends DefaultModel
{
    private $value;
    private $numberInstallments;
    private $expirationDate;
    private $saleDescription;
    private $cardNumber;
    private $firstName;
    private $lastName;
    private $cardholder;
    private $securityCode;
    private $monthExpiration;
    private $yearExpiration;
    private $address;

    public function setValue(float $value)
    {
        $this->value = $value;
    }

    public function setNumberInstallments(int $numberInstallments)
    {
        $this->numberInstallments = $numberInstallments;
    }

    public function setExpirationDate(string $expirationDate)
    {
        $this->expirationDate = $expirationDate;
    }

    public function setSaleDescription(string $saleDescription)
    {
        $this->saleDescription = $saleDescription;
    }

    public function setCardNumber(int $cardNumber)
    {
        $this->cardNumber = $cardNumber;
    }

    public function setFirstName(string $firstName)
    {
        $this->firstName = $firstName;
    }

    public function setLastName(string $lastName)
    {
        $this->lastName = $lastName;
    }

    public function setCardholder(string $cardholder)
    {
        $this->cardholder = $cardholder;
    }

    public function setSecurityCode(int $securityCode)
    {
        $this->securityCode = $securityCode;
    }

    public function setMonthExpiration(string $monthExpiration)
    {
        $this->monthExpiration = $monthExpiration;
    }

    public function setYearExpiration(string $yearExpiration)
    {
        $this->yearExpiration = $yearExpiration;
    }

    public function setAddress(Address $address)
    {
        $this->address = $address;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getNumberInstallments()
    {
        return $this->numberInstallments;
    }

    public function getExpirationDate()
    {
        return $this->expirationDate;
    }

    public function getSaleDescription()
    {
        return $this->saleDescription;
    }

    public function getCardNumber()
    {
        return $this->cardNumber;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getCardholder()
    {
        return $this->cardholder;
    }

    public function getSecurityCode()
    {
        return $this->securityCode;
    }

    public function getMonthExpiration()
    {
        return $this->monthExpiration;
    }

    public function getYearExpiration()
    {
        return $this->yearExpiration;
    }

    public function getAddress()
    {
        return $this->address;
    }
}
