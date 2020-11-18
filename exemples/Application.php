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
$getApplication = new GetApplication($apiContext);

$newEditApplication = new Application;
$newEditApplication->setId(199);  // se for Edit, precisa preencher, se for novo, comentar a linha
$newEditApplication->setApplicationMain(false);  // se for a sua aplicação principal, setar true se não, setar false, válido no novo registro e no editar
$newEditApplication->setName('testando811123');
$newEditApplication->setUrl('http://4fsfff22a2aa2.com.br');
$newEditApplication->setApplicationKey('123abc123abc123abc');

// registrar aplicação do contrato
$returnNewApplication = $getApplication->executeRegisterApplication($newEditApplication);
dd($returnNewApplication);

//// mostrar aplicações do contrato
//$listContractAll = 300;  // se setar valor do id, retorna somente o contrato do id, se passar null, retorna todos os contratos
//$returnViewApplication = $getApplication->executeListApplication($listContractAll);
//dd($returnViewApplication);

// editar aplicação
// $returnEditApplication = $getApplication->executeEditApplication($newEditApplication);
// dd($returnEditApplication);