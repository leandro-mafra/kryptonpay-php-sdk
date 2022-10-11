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
use KryptonPay\Api\Pix;
use KryptonPay\Api\Calendar;
use KryptonPay\Api\Transaction;

$apiContext = new ApiContext();
$apiContext->setIsSandbox(true);
$apiContext->setApiToken('seu_token');

$transaction = new Transaction();
$transaction->setPaymentType(ApiContext::PIX);
$transaction->setIsQuickSale(false);
$transaction->setApplication(null);
$transaction->setReference('00001');

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
$item->setCode('1234');
$item->setDescription('Item');
$item->setUnitPrice(39.90);
$item->setQuantity('1');
$transaction->addItem($item);

$calendar = new Calendar();
$calendar->setDueDate(date('Y-m-d', strtotime('+5 day')));

$pix = new Pix();
$pix->setValue('39.90');
$pix->setPayerRequest('Cobrança dos serviços prestados');
$pix->setCalendar($calendar);
$transaction->setPix($pix);

$apiContext->setTransaction($transaction);

KryptonPay::createPayment($apiContext);
