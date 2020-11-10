<?php

namespace KryptonPay\Api;

class Transaction extends DefaultModel
{
    private $paymentType;
    private $isQuickSale;
    private $application = null;
    private $assumeTax = null;
    private $reference;
    private $id;
    private $referenceTable = null;
    private $paymentTypes = [];
    private $payer;
    private $itens = [];
    private $creditCard;
    private $slip;
    private $split = [];
    private $address;

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function setPaymentType(int $paymentType)
    {
        $this->paymentType = $paymentType;
    }

    public function setIsQuickSale(bool $isQuickSale = false)
    {
        $this->isQuickSale = $isQuickSale;
    }

    public function setApplication(int $application = null)
    {
        $this->application = $application;
    }

    public function setAssumeTax(bool $assumeTax)
    {
        $this->assumeTax = $assumeTax;
    }

    public function setReference(string $reference)
    {
        $this->reference = $reference;
    }

    public function setReferenceTable(string $referenceTable)
    {
        $this->referenceTable = $referenceTable;
    }

    public function setPaymentTypes(array $paymentTypes = [])
    {
        $this->paymentTypes = $paymentTypes;
    }

    public function setPayer(Payer $payer)
    {
        $this->payer = $payer;
    }

    public function addId(Item $id)
    {
        $this->id[] = $id;
    }

    public function addItem(Item $item)
    {
        $this->itens[] = $item;
    }

    public function setCreditCard(CreditCard $creditCard)
    {
        $this->creditCard = $creditCard;
    }

    public function setSlip(Slip $slip)
    {
        $this->slip = $slip;
    }

    public function addSplit(Split $split)
    {
        $this->split[] = $split;
    }

    public function setAddress(Split $address)
    {
        $this->address = $address;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getPaymentType()
    {
        return $this->paymentType;
    }

    public function getIsQuickSale()
    {
        return $this->isQuickSale;
    }

    public function getApplication()
    {
        return $this->application;
    }

    public function getAssumeTax()
    {
        return $this->assumeTax;
    }

    public function getReference()
    {
        return $this->reference;
    }

    public function getReferenceTable()
    {
        return $this->referenceTable;
    }

    public function getPaymentTypes()
    {
        return $this->paymentTypes;
    }

    public function getPayer()
    {
        return $this->payer;
    }

    public function getItem()
    {
        return $this->itens;
    }

    public function getCreditCard()
    {
        return $this->creditCard;
    }

    public function getSlip()
    {
        return $this->slip;
    }

    public function getSplit()
    {
        return $this->split;
    }

    public function getAddress()
    {
        return $this->address;
    }
}
