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
$apiContext->setApiToken('eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vZ2F0ZXdheS1sb2NhbC1hcGkvbG9naW4iLCJpYXQiOjE2MTY0OTkxMDksIm5iZiI6MTYxNjQ5OTEwOSwianRpIjoiRE5OYlFCT0J6dWNMd3NXRiIsInN1YiI6MSwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyIsImxjbCI6InB0LWJyIiwidGtuIjpmYWxzZSwiZGF0ZXRpbWUiOiIyMDIxLTAzLTIzVDExOjMxOjQ5KzAwMDAifQ.Q8k_vyrYDA9MtRw_nAacXIV1aBM-5Bpwira-NVqSMak');

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

// Buscar contrato por id
//$getContract = new Contract();
//$getContract->setId(203);
//
//$returnGetContract = $contract->getContract($getContract);
//var_dump($returnGetContract);

// Buscar contrato por cpfCnpj
$getContract = new Contract();
$getContract->setCpfCnpj('11508222000136');

$returnGetContract = $contract->getContractByCnpfCnpj($getContract);
var_dump($returnGetContract);

// Buscar Contratos
//$returnAllContracts = $contract->allContracts();
//var_dump($returnAllContracts);
