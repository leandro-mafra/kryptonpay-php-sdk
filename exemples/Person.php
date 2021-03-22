<?php

use KryptonPay\Api\ApiContext;
use KryptonPay\Api\Payer;
use KryptonPay\Service\Register\PersonRegister;

ini_set("display_errors", 1);
ini_set("display_startup_erros", 1);
error_reporting(E_ALL);

require_once 'vendor/autoload.php';

$apiContext = new ApiContext();
$apiContext->setIsSandbox(true);
$apiContext->setApiToken('eyJ0eXAiOiJKV1QiLCJhbGasdciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2FwaS5rcnlwdG9ucGF5LmNvbS5ici9asd1c2Vycy8yL3Rva2VuIiwiaWF0IjoxNTc1NDg1NTc0LCJasduYmYiOjE1NzU0ODU1NzQsImp0aSI6InBDeUdZS2ZkajlrOG44eWkiLCJzdWIiOjIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjciLCJsY2wiOiJwdC1iciIsInRrbiI6dHJ1ZSwiZGF0ZXRpbWUiOiIyMDE5LTEyLTA0VDE4OjUyOjU0KzAwMDAifQ.MF_Zeg7whvyk9gxs7oi3Gk9kdefg0WvlSNbSokasdRwCyQ');

$person = new PersonRegister($apiContext);

// Registra pessoa
//$createPerson = new Payer();
//$createPerson->setTipo(2);
//$createPerson->setNome('robson teste 01');
//$createPerson->setEmail('teste124@hotmail.com');
//$createPerson->setCpf('09181444699'); // Será usado se tipo 1
//$createPerson->setCnpj('13796297000195'); // Será usado se tipo 2
//$createPerson->setDataNascimento('01-07-1990');
//$createPerson->setNomeFantasia('teste robson 2'); // Será usado se tipo 2
//
//$returnCreatePerson = $person->createPerson($createPerson);
//var_dump($returnCreatePerson);

// Busca pessoas
$returnAllPersons = $person->allPersons();
var_dump($returnAllPersons);