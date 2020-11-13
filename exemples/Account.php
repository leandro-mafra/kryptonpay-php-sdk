<?php

use KryptonPay\Api\ApiContext;
use KryptonPay\Api\Account;
use KryptonPay\Service\Register\GetAccount;

ini_set("display_errors", 1);
ini_set("display_startup_erros", 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

$apiContext = new ApiContext();
$apiContext->setIsSandbox(true);
$apiContext->setApiToken('eyJ0eXAiOiJKV1QiLCJhbGasdciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2FwaS5rcnlwdG9ucGF5LmNvbS5ici9asd1c2Vycy8yL3Rva2VuIiwiaWF0IjoxNTc1NDg1NTc0LCJasduYmYiOjE1NzU0ODU1NzQsImp0aSI6InBDeUdZS2ZkajlrOG44eWkiLCJzdWIiOjIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjciLCJsY2wiOiJwdC1iciIsInRrbiI6dHJ1ZSwiZGF0ZXRpbWUiOiIyMDE5LTEyLTA0VDE4OjUyOjU0KzAwMDAifQ.MF_Zeg7whvyk9gxs7oi3Gk9kdefg0WvlSNbSokasdRwCyQ');

$getAccount = new GetAccount($apiContext);

$newAccountPessoa = new Account();
$newAccountPessoa->setTypePerson(1);
$newAccountPessoa->setBirth('1990-07-21');
$newAccountPessoa->setName('nome sobrenome');
$newAccountPessoa->setEmail('email@hotmail.com');
$newAccountPessoa->setCpf('86930357626'); //digits:11
$newAccountPessoa->setCnpj('01645716000109'); //digits:14 | required_if:tipo,2
$newAccountPessoa->setFantasyName('nome fantasia'); //required_if:tipo,2
$newAccountPessoa->setPassword('123');

//$newAccountPessoaResponsavel somente se $newAccountPessoa->setTypePerson() = 1;
$newAccountPessoaResponsible = new Account();
$newAccountPessoaResponsible->setTypePerson(1);
$newAccountPessoaResponsible->setBirth('1990-07-21');
$newAccountPessoaResponsible->setName('nome sobrenome');
$newAccountPessoaResponsible->setEmail('email@email.com');
$newAccountPessoaResponsible->setCpf('05205087692');
//$newAccountPessoaResponsavel somente se $newAccountPessoa->setTypePerson() = 1;

$newAccountAddress = new Address();
$newAccountAddress->setStreet('rua');
$newAccountAddress->setNumber('124');
$newAccountAddress->setDistrict('bairro');
$newAccountAddress->setZipCode('30123123');
$newAccountAddress->setComplement('complemento');
$newAccountAddress->setOutsideAddress(false);
$newAccountAddress->setIdNation(76); 

$newAccountBank = new BankAccount();
$newAccountBank->setAccountType(1212);
$newAccountBank->setBank('705');
$newAccountBank->setDigitAgency(4);
$newAccountBank->setAccount('123456789');
$newAccountBank->setAgency('12345');
$newAccountBank->setDigitAccount(9);
// $newAccountBank->setOperation('123');

$responsible = $newAccountPessoa->getTypePerson();
$checkFields = $getAccount->executeRegisterAccount($newAccountPessoa, $newAccountAddress, $newAccountBank, ($responsible == 1) ? null : $newAccountPessoaResponsible);
dd($checkFields);