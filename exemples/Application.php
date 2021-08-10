<?php

use KryptonPay\Api\ApiContext;
use KryptonPay\Api\Application;
use KryptonPay\Service\Register\ApplicationRegister;

ini_set("display_errors", 1);
ini_set("display_startup_erros", 1);
error_reporting(E_ALL);

require_once 'vendor/autoload.php';

$apiContext = new ApiContext();
$apiContext->setIsSandbox(true);
$apiContext->setApiToken('eyJ0eXAiOiJKV1QiLCJhbGasdciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2FwaS5rcnlwdG9ucGF5LmNvbS5ici9asd1c2Vycy8yL3Rva2VuIiwiaWF0IjoxNTc1NDg1NTc0LCJasduYmYiOjE1NzU0ODU1NzQsImp0aSI6InBDeUdZS2ZkajlrOG44eWkiLCJzdWIiOjIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjciLCJsY2wiOiJwdC1iciIsInRrbiI6dHJ1ZSwiZGF0ZXRpbWUiOiIyMDE5LTEyLTA0VDE4OjUyOjU0KzAwMDAifQ.MF_Zeg7whvyk9gxs7oi3Gk9kdefg0WvlSNbSokasdRwCyQ');

$application = new ApplicationRegister($apiContext);

// registrar aplicação do contrato
$createApplication = new Application();
$createApplication->setNome('teste1122212211');
$createApplication->setUrl('http://4fs12fff22a2a112a2.com.br');
$createApplication->setDefault(true);  // se for a sua aplicação principal, setar true se não, setar false, válido no novo registro e no editar
$createApplication->setApplicationKey('12312abc123abc123abc1');
$createApplication->setContract(5);

$createApplication = $application->createApplication($createApplication);
var_dump($createApplication);


// editar aplicação do contrato
//$editApplication = new Application();
//$editApplication->setId(122);  // se for Edit, precisa preencher, se for novo, comentar a linha
//$editApplication->setNome('teste1122212211');
//$editApplication->setUrl('http://4fs12fff22a2a112a2.com.br');
//$editApplication->setDefault(true);  // se for a sua aplicação principal, setar true se não, setar false, válido no novo registro e no editar
//$editApplication->setApplicationKey('12312abc123abc123abc1');
//$editApplication->setContract(5);
//
//$editApplication = $application->editApplication($editApplication);
//var_dump($editApplication);

// mostrar aplicações do contrato
$getApplicationIdOrAll = $application->getApplicationIdOrAll(5, null); // se setar valor do id, retorna somente o contrato do id, se passar null, retorna todos os contratos
var_dump($getApplicationIdOrAll);