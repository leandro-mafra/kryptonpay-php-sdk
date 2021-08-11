<?php

use KryptonPay\Api\ApiContext;
use KryptonPay\Service\Transaction\GetTransaction;

ini_set("display_errors", 1);
ini_set("display_startup_erros", 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

$apiContext = new ApiContext();
$apiContext->setIsSandbox(true);
$apiContext->setApiToken('seu_token');

$getTransaction = new GetTransaction($apiContext);
$getTransaction->setReference(1);
$transaction = $getTransaction->execute();
