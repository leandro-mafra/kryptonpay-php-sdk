<?php
/**
 * Created by PhpStorm.
 * User: Guilherme Viana <guilhermecfviana@gmail.com>
 * Date: 11/08/2021
 * Time: 13:55
 */


ini_set("display_errors", 1);
ini_set("display_startup_erros", 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

$apiContext = new \KryptonPay\Api\ApiContext();
$apiContext->setIsSandbox(true);
$apiContext->setApiToken('eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vaG9tb2xvZ2FjYW8uYXBpLmtyeXB0b25wYXkuY29tLmJyL3VzZXJzLzE0OC90b2tlbiIsImlhdCI6MTYyODAxNjkyOCwibmJmIjoxNjI4MDE2OTI4LCJqdGkiOiI2TlRtcnBiaVE5cERISmFyIiwic3ViIjoxNDgsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjciLCJsY2wiOiJwdC1iciIsInRrbiI6ZmFsc2UsImRhdGV0aW1lIjoiMjAyMS0wOC0wM1QxNTo1NToyOC0wMzAwIn0.NhYFsxY4ulpOvjfP9T_fxvTls9Fx-gJLENMH1SAuhyk');

// Objeto Application
$application = new \KryptonPay\Api\Application();
$application->setName('WEBHOOK_KERP');
$application->setDefault(true);
$application->setApplicationKey(hash('sha512', 'stringapplicationkey'));
$application->setUrl('https://minhaurl.com.br/999999');


$apiContext->setApplication($application);
$return = \KryptonPay\Api\KryptonPay::createApplication($apiContext, 595);

print_r($return);

