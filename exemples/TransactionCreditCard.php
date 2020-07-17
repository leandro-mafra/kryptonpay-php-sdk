<?php

ini_set("display_errors", 1);
ini_set("display_startup_erros", 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

use KryptonPay\Api\Address;
use KryptonPay\Api\ApiContext;
use KryptonPay\Api\CreditCard;
use KryptonPay\Api\Item;
use KryptonPay\Api\KryptonPay;
use KryptonPay\Api\Payer;
use KryptonPay\Api\Transaction;

$apiContext = new ApiContext();
$apiContext->setIsSandbox(true);
$apiContext->setApiToken('eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2FwaS5rcnlwdG9ucGF5LmNvbS5ici91c2Vycy8yL3Rva2VuIiwiaWF0IjoxNTc1NDg1NTc0LCJuYmYiOjE1NzU0ODU1NzQsImp0aSI6InBDeUdZS2ZkajlrOGasd44eWkiLCJzdWIiOjIsInBydiI6IjIasdzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRaasdiN2E1OTc2ZjciLCJs2123Y2wiOiJwdC1iciIsInRrbiI6dHJ1ZSwiZGF0ZXRpbWUiOiIhdfgyMDE5LTEyLTA0VDE4OjUyOjU0KzAwMDAifQ.MF_Zeg7whvyk9gxs7oi3Gk9kdefg0WvlSNbSokRwCyQ');

$transaction = new Transaction();
$transaction->setIsQuickSale(false);
$transaction->setApplication(null);
$transaction->setReference('00001');
$transaction->setPaymentType(ApiContext::CREDIT_CARD);

$payerAddress = new Address();
$payerAddress->setStreet('Rua Dona Ana Vieira');
$payerAddress->setNumber('34');
$payerAddress->setDistrict('Saudade');
$payerAddress->setZipCode('30285420');
$payerAddress->setComplement('CS');
$payerAddress->setStateInitials('MG');
$payerAddress->setCityName('Belo Horizonte');
$payerAddress->setCountryName('Brasi');

$payer = new Payer();
$payer->setType(ApiContext::PERSON_NATURAL);
$payer->setName('Jose Francisco');
$payer->setIdentity('63728975044');
$payer->setBirthDate('1995-08-06');
$payer->setEmail('jose.fcts@gmail.com');
$payer->setAddress($payerAddress);
$transaction->setPayer($payer);

$item = new Item();
$item->setCode('5571');
$item->setDescription('produto X');
$item->setUnitPrice('19.80');
$item->setQuantity('1');
$transaction->addItem($item);

$cardholderAddress = new Address();
$cardholderAddress->setStreet('Rua Dona Ana Vieira');
$cardholderAddress->setNumber('34');
$cardholderAddress->setDistrict('Saudade');
$cardholderAddress->setZipCode('30285420');
$cardholderAddress->setComplement('CS');
$cardholderAddress->setStateInitials('MG');
$cardholderAddress->setCityName('Belo Horizonte');
$cardholderAddress->setCountryName('Brasi');

$creditCard = new CreditCard();
$creditCard->setValue(19.80);
$creditCard->setNumberInstallments(1);
$creditCard->setSaleDescription('LOJA*TESTE*COMPRA-123');
$creditCard->setCardNumber('5411174299353800');
$creditCard->setCardholder('PESSOA DE HOMOLOGACAO');
$creditCard->setSecurityCode(776);
$creditCard->setMonthExpiration('05');
$creditCard->setYearExpiration('21');
$creditCard->setAddress($cardholderAddress);
$transaction->setCreditCard($creditCard);

$apiContext->setTransaction($transaction);

$transaction = KryptonPay::createPayment($apiContext);

dd($transaction);
