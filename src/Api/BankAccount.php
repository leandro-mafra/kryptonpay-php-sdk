<?php

namespace KryptonPay\Api;
use stdClass;

class BankAccount extends DefaultModel
{
    private $ownerAccount;
    private $accountType;
    private $bank;
    private $digitAgency;
    private $account;
    private $agency;
    private $digitAccount;
    private $operation;
    private $code;
            
    public function setOwnerAccount(int $ownerAccount)
    {
        $this->ownerAccount = $ownerAccount;
    }

    public function setAccountType(string $accountType)
    {
        $this->accountType = $accountType;
    }

    public function setBank(string $bank)
    {
        $this->bank = $bank;
    }

    public function setDigitAgency(int $digitAgency)
    {
        $this->digitAgency = $digitAgency;
    }  

    public function setAccount(string $account)
    {
        $this->account = $account;
    } 

    public function setAgency(string $agency)
    {
        $this->agency = $agency;
    } 

    public function setDigitAccount(int $digitAccount)
    {
        $this->digitAccount = $digitAccount;
    } 

    public function setOperation(string $operation)
    {
        $this->operation = $operation;
    } 

    public function setCode(string $code)
    {
        $this->code = $code;
    }      

    public function getOwnerAccount()
    {
        return $this->ownerAccount;
    }

    public function getAccountType()
    {
        return $this->accountType;
    }

    public function getBank()
    {
        return $this->bank;
    }

    public function getDigitAgency()
    {
        return $this->digitAgency;
    }

    public function getAccount()
    {
        return $this->account;
    }

    public function getAgency()
    {
        return $this->agency;
    }

    public function getDigitAccount()
    {
        return $this->digitAccount;
    }

    public function getOperation()
    {
        return $this->operation;
    }

    public function getCode()
    {
        return $this->code;
    } 

    public function translateFieldsBankAccount($data)
    {
        $newFildsBankAccount = new stdClass();
        $newFildsBankAccount->tipoConta     = $data->accountType;
        $newFildsBankAccount->codigoBanco   = $data->bank;
        $newFildsBankAccount->agenciaDigito = $data->digitAgency;
        $newFildsBankAccount->conta         = $data->account;
        $newFildsBankAccount->agencia       = $data->agency;
        $newFildsBankAccount->contaDigito   = $data->digitAccount;
        $newFildsBankAccount->operacao      = $data->operation;   

        return $newFildsBankAccount;
    }    
}

