<?php

namespace KryptonPay\Service\Register;

use KryptonPay\Api\ApiContext;
use KryptonPay\Api\KryptonPay;
use KryptonPay\Service\Api\Client;
use KryptonPay\Api\Account;
use KryptonPay\Api\Address;
use KryptonPay\Api\BankAccount;
use StdClass;

class GetAccount
{
    protected $apiContext;
    protected $kryptonPay;
    protected $accountDate;

    public function __construct(ApiContext $apiContext)
    {
        $this->apiContext  = $apiContext;
        $this->kryptonPay  = new KryptonPay();
        $this->account     = new Account();
        $this->address     = new Address();
        $this->bankAccount = new BankAccount();        
    }    

    public function executeRegisterAccount($accountPessoa, $accounteAddress ,$accountBankAccount, $newAccountPessoaResponsible)
    {        
        $ObjectAccount = new StdClass();
        $ObjectAccount->pessoa                   = $this->account->translateFieldsAccount($accountPessoa);
        $ObjectAccount->endereco                 = $this->address->translateFieldsAddress($accounteAddress);
        $ObjectAccount->contrato                 = $this->account->translateFieldsContract();
        $ObjectAccount->contrato->dadosBancarios = $this->bankAccount->translateFieldsBankAccount($accountBankAccount);
        $ObjectAccount->usuario                  = $this->account->translateFieldsUsuario($accountPessoa);        

        if(!is_null($newAccountPessoaResponsible))
        {
            $ObjectAccount->pessoa->responsavel = $this->account->translateFieldsResponsible($newAccountPessoaResponsible);
        }

        return $this->kryptonPay->createAccount($this->apiContext, $ObjectAccount); 
    }       
}
