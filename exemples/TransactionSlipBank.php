<?php

ini_set("display_errors", 1);
ini_set("display_startup_erros", 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

use KryptonPay\Api\Address;
use KryptonPay\Api\ApiContext;
use KryptonPay\Api\Item;
use KryptonPay\Api\KryptonPay;
use KryptonPay\Api\Payer;
use KryptonPay\Api\Slip;
use KryptonPay\Api\Split;
use KryptonPay\Api\Transaction;

$apiContext = new ApiContext();
$apiContext->setIsSandbox(true);
$apiContext->setApiToken('eyJ0eXAiOiJKV1QiLCJhbGc213iOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2FwasdasaS5rcnlwdG9ucGF5LmNvbS5ici91c2Vycy8yL3Rva2VuIiwiaWF0IjoxNTc1NDg1NThgc0LCJuYmYiOjEda1NzU0ODU1NzQsImp0aSI6InBDeUdZS2ZkajlrOG44eWkiLCJzdWIiOjIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjciLCJsY2wiOiJwdC1iciIsInRrbiI6dHJ1ZSwiZGF0ZXa23RpbWUiOiIyMDE5LTEyLTA0VDE4OjUyOjU0KzAwMDAifQ.MF_Zeg7whvyk9gxs7oi3Gk9kdefg0WasdvlSNbSokRwCyQ');

$transaction = new Transaction();
$transaction->setPaymentType(ApiContext::SLIPBANK);
$transaction->setIsQuickSale(false);
$transaction->setApplication(null);
$transaction->setReference('00001');

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
$payer->setIdentity('12540548636');
$payer->setBirthDate('1995-08-06');
$payer->setEmail('jose.fcts@gmail.com');
$payer->setAddress($payerAddress);
$transaction->setPayer($payer);

$item = new Item();
$item->setCode('1234');
$item->setDescription('Jose Francisco');
$item->setUnitPrice('12540548636');
$item->setQuantity('1');
$transaction->addItem($item);

$slipBank = new Slip();
$slipBank->setValue('39.90');
$slipBank->setInstruction('Pagar em qualquer correpondente bancário');
$slipBank->setDueDate(date('Y-m-d', strtotime('+5 day')));
$slipBank->addObservation('Pagamento referente a compra de X produto');
$transaction->setSlip($slipBank);

$apiContext->setTransaction($transaction);

dd(KryptonPay::createPayment($apiContext));
