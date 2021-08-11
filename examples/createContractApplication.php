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
$apiContext->setApiToken('seu_token');

// Objeto Application
$application = new \KryptonPay\Api\Application();
$application->setName('WEBHOOK_KERP');
$application->setDefault(true);
$application->setApplicationKey(hash('sha512', 'stringapplicationkey'));
$application->setUrl('https://minhaurl.com.br/999999');


$apiContext->setApplication($application);
$return = \KryptonPay\Api\KryptonPay::createApplication($apiContext, 595);

print_r($return);

