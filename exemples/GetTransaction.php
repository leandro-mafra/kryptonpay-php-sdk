<?php

use KryptonPay\Api\ApiContext;
use KryptonPay\Service\Transaction\GetTransaction;

ini_set("display_errors", 1);
ini_set("display_startup_erros", 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

$apiContext = new ApiContext();
$apiContext->setIsSandbox(true);
$apiContext->setApiToken('eyJ0eXAiOiJKV1QiLCJhbGasdciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2FwaS5rcnlwdG9ucGF5LmNvbS5ici9asd1c2Vycy8yL3Rva2VuIiwiaWF0IjoxNTc1NDg1NTc0LCJasduYmYiOjE1NzU0ODU1NzQsImp0aSI6InBDeUdZS2ZkajlrOG44eWkiLCJzdWIiOjIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjciLCJsY2wiOiJwdC1iciIsInRrbiI6dHJ1ZSwiZGF0ZXRpbWUiOiIyMDE5LTEyLTA0VDE4OjUyOjU0KzAwMDAifQ.MF_Zeg7whvyk9gxs7oi3Gk9kdefg0WvlSNbSokasdRwCyQ');

$getTransaction = new GetTransaction($apiContext);

// - $idReference
// - 0 ID
// - 1 Referencia

// Se PDF true  = xml False 
// Se PDF false = xml true

$idReference = 1;
$PDF         = true;

switch ($idReference) {
    case 0:
        $getTransaction->setId(1);
        dd($transaction = $getTransaction->executeById($PDF));        
        break;

    case 1:
        $getTransaction->setReference(1);
        dd($transaction = $getTransaction->executeByReference($PDF));
        break;
}
