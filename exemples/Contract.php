<?php

use KryptonPay\Api\ApiContext;
use KryptonPay\Api\Contract;
use KryptonPay\Service\Register\ContractRegister;

ini_set("display_errors", 1);
ini_set("display_startup_erros", 1);
error_reporting(E_ALL);

require_once 'vendor/autoload.php';

$apiContext = new ApiContext();
$apiContext->setIsSandbox(true);
$apiContext->setApiToken('eyJ0eXAiOiJKV1QiLCJhbGasdciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2FwaS5rcnlwdG9ucGF5LmNvbS5ici9asd1c2Vycy8yL3Rva2VuIiwiaWF0IjoxNTc1NDg1NTc0LCJasduYmYiOjE1NzU0ODU1NzQsImp0aSI6InBDeUdZS2ZkajlrOG44eWkiLCJzdWIiOjIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjciLCJsY2wiOiJwdC1iciIsInRrbiI6dHJ1ZSwiZGF0ZXRpbWUiOiIyMDE5LTEyLTA0VDE4OjUyOjU0KzAwMDAifQ.MF_Zeg7whvyk9gxs7oi3Gk9kdefg0WvlSNbSokasdRwCyQ');

$contract = new ContractRegister($apiContext);

// Registrar contrato
//$createContract = new Contract();
//$createContract->setDataInicio(date('Y-m-d'));
//$createContract->setDataValidade(date('Y-m-d', strtotime('+1 year')));
//$createContract->setIdTabela(3);
//$createContract->setIdPessoa(283);
//$createContract->setIdResponsavel(283);
//$createContract->setObservacao('teste');
//$createContract->setStatus(true);
//
//$returnCreateContract = $contract->createContract($createContract);
//var_dump($returnCreateContract);

// Editar contrato
//$updateContract = new Contract();
//$updateContract->setId(203);
//$updateContract->setDataInicio(date('Y-m-d'));
//$updateContract->setDataValidade(date('Y-m-d', strtotime('+1 year')));
//$updateContract->setIdTabela(3);
//$updateContract->setIdPessoa(283);
//$updateContract->setIdResponsavel(283);
//$updateContract->setObservacao('teste');
//$updateContract->setStatus(true);
//
//$updateContract = $contract->updateContract($updateContract);
//var_dump($updateContract);

// Buscar contrato
//$getContract = new Contract();
//$getContract->setId(203);
//
//$returnGetContract = $contract->getContract($getContract);
//var_dump($returnGetContract);

// Buscar contrato por cpfCnpj
$getContract = new Contract();
$getContract->setCpfCnpj('11508222000136');

$returnGetContract = $contract->getContractByCpfCnpj($getContract);
var_dump($returnGetContract);

// Buscar Contratos
$returnAllContracts = $contract->allContracts();
var_dump($returnAllContracts);

// Buscar subContratos
$returnAllContracts = $contract->allSubContracts(1, null);
var_dump($returnAllContracts);

// Buscar subContratos com parametros

$arrayParametros = [
    'includes' => 'pessoa'
];

$returnAllContracts = $contract->allSubContracts(1, $arrayParametros);
var_dump($returnAllContracts);

// Buscar subContratos ID com parametros

$arrayParametros = [
    'includes' => 'pessoa'
];

$returnAllContracts = $contract->allSubContractById(1, 1, $arrayParametros);
var_dump($returnAllContracts);