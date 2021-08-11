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
$apiContext->setApiToken('seu_token');

$transaction = new Transaction();
$transaction->setIsQuickSale(false);
$transaction->setApplication(null);
$transaction->setReference('00001');
$transaction->setPaymentType(ApiContext::CREDIT_CARD);

$payerAddress = new Address();
$payerAddress->setStreet('Rua Teste');
$payerAddress->setNumber('34');
$payerAddress->setDistrict('Novo Horizonte');
$payerAddress->setZipCode('30273129');
$payerAddress->setComplement('CS');
$payerAddress->setStateInitials('MG');
$payerAddress->setCityName('Belo Horizonte');
$payerAddress->setCountryName('Brasi');

$payer = new Payer();
$payer->setType(ApiContext::PERSON_NATURAL);
$payer->setName('John Doe');
$payer->setIdentity('63728975044');
$payer->setBirthDate('1994-23-06');
$payer->setEmail('john.doe@email.com');
$payer->setAddress($payerAddress);
$transaction->setPayer($payer);

$item = new Item();
$item->setCode('5571');
$item->setDescription('produto X');
$item->setUnitPrice('19.80');
$item->setQuantity('1');
$transaction->addItem($item);

$cardholderAddress = new Address();
$cardholderAddress->setStreet('Rua Teste');
$cardholderAddress->setNumber('34');
$cardholderAddress->setDistrict('Novo Horizonte');
$cardholderAddress->setZipCode('30273129');
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
