<?php

require_once 'vendor/autoload.php';

use KryptonPay\Api\ApiContext;
use KryptonPay\Api\CreditCard;
use KryptonPay\Api\Item;
use KryptonPay\Api\KryptonPay;
use KryptonPay\Api\Payer;
use KryptonPay\Api\Address;
use KryptonPay\Api\Split;
use KryptonPay\Api\Transaction;

$apiContext = new ApiContext();
$apiContext->setApiToken('eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vZ2F0ZXdheS1hcGktbG9jYWwvdXNlcnMvMS90b2tlbiIsImlhdCI6MTU4MDc1MTU1MywibmJmIjoxNTgwNzUxNTUzLCJqdGkiOiI3NDZyekV6T2dFQmlGTWpCIiwic3ViIjoxLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3IiwibGNsIjoicHQtYnIiLCJ0a24iOnRydWUsImRhdGV0aW1lIjoiMjAyMC0wMi0wM1QxNzozOToxMyswMDAwIn0.liP4txyQdhLgivFvk1n9qtmxj0tjm1WOpkC6Aku6C3c');
$apiContext->setIsSandbox(false);

$transaction = new Transaction();
$transaction->setPaymentType(ApiContext::CREDIT_CARD);
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
$item->setQuantity('1995-08-06');
$transaction->setItem($item);

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
$creditCard->setValue(100);
$creditCard->setNumberInstallments(1);
$creditCard->setExpirationDate('2020-04-30');
$creditCard->setSaleDescription('LOJA*TESTE*COMPRA-123');
$creditCard->setCardNumber('4012001037141112');
$creditCard->setFirstName('João');
$creditCard->setLastName('da Silva');
$creditCard->setCardholder('JOAO DA SILVA');
$creditCard->setSecurityCode(123);
$creditCard->setMonthExpiration('12');
$creditCard->setYearExpiration('22');
$creditCard->setAddress($cardholderAddress);
$transaction->setCreditCard($creditCard);

$split = new Split();
$split->setDocument('1234');
$split->setValue('Jose Francisco');
$split->setTax('12540548636');
$transaction->setSplit($split);

$apiContext->setTransaction($transaction);

KryptonPay::createPayment($apiContext);
