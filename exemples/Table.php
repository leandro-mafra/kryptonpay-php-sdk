<?php

use KryptonPay\Api\ApiContext;
use KryptonPay\Api\Table;
use KryptonPay\Api\TableService;
use KryptonPay\Api\InstallmentsTax;
use KryptonPay\Service\Register\Table as NewTable ;
use KryptonPay\Service\Register\GetApplication;

ini_set("display_errors", 1);
ini_set("display_startup_erros", 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

$apiContext = new ApiContext();
$apiContext->setIsSandbox(true);
$apiContext->setApiToken('eyJ0eXAiOiJKV1QiLCJhbGasdciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2FwaS5rcnlwdG9ucGF5LmNvbS5ici9asd1c2Vycy8yL3Rva2VuIiwiaWF0IjoxNTc1NDg1NTc0LCJasduYmYiOjE1NzU0ODU1NzQsImp0aSI6InBDeUdZS2ZkajlrOG44eWkiLCJzdWIiOjIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjciLCJsY2wiOiJwdC1iciIsInRrbiI6dHJ1ZSwiZGF0ZXRpbWUiOiIyMDE5LTEyLTA0VDE4OjUyOjU0KzAwMDAifQ.MF_Zeg7whvyk9gxs7oi3Gk9kdefg0WvlSNbSokasdRwCyQ');

// Table -----------------------------------------------

$newEditTable = new Table();
$newEditTable->setIdTable(254);  // será usado apenas para editar
$newEditTable->setNameTable('teste787878787878787878787');
$newEditTable->setDescriptionTable('teste787878787878787878787');
$newEditTable->setStatusTable(1);

// Slip ---------------------------------------------------

//$valuesSlip = new TableService();
//$valuesSlip->setIdTableService(1);
//$valuesSlip->setDaysForPaymentTableService('10');
//$valuesSlip->setReplicateTaxTableService(true);
//$valuesSlip->setTaxTableService(2.50);
//
//$newEditTable->addServicesTable(1, $valuesSlip);

// Card ----------------------------------------------------

$valuesCard = new TableService();
$valuesCard->setIdTableService(2);
$valuesCard->setDaysForPaymentTableService('20');
$valuesCard->setReplicateTaxTableService(true);

$installmentsTax = new InstallmentsTax();
//$installmentsTax->addInstallmentsTax(1.91);  // parcela1
//$installmentsTax->addInstallmentsTax(1.92);  // parcela2
//$installmentsTax->addInstallmentsTax(2.23);  // parcela3
//$installmentsTax->addInstallmentsTax(2.54);  // parcela4

$installmentsTax->addInstallmentsTaxFix(10, 2.80);  // parcelas fixas

$newEditTable->addServicesTable(2, $valuesCard);
$valuesCard->addInstallments($installmentsTax->getInstallmentsTax());

// ----------------------------------------------------------

$returnNewEditTable = new NewTable($apiContext);
$returnNewEditTable = $returnNewEditTable->executeNewTable($newEditTable);
var_dump($returnNewEditTable);