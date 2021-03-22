<?php

use KryptonPay\Api\ApiContext;
use KryptonPay\Api\Token;
use KryptonPay\Service\Register\UserTokenRegister;

ini_set("display_errors", 1);
ini_set("display_startup_erros", 1);
error_reporting(E_ALL);

require_once 'vendor/autoload.php';

$apiContext = new ApiContext();
$apiContext->setIsSandbox(true);
$apiContext->setApiToken('eyJ0eXAiOiJKV1QiLCJhbGasdciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2FwaS5rcnlwdG9ucGF5LmNvbS5ici9asd1c2Vycy8yL3Rva2VuIiwiaWF0IjoxNTc1NDg1NTc0LCJasduYmYiOjE1NzU0ODU1NzQsImp0aSI6InBDeUdZS2ZkajlrOG44eWkiLCJzdWIiOjIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjciLCJsY2wiOiJwdC1iciIsInRrbiI6dHJ1ZSwiZGF0ZXRpbWUiOiIyMDE5LTEyLTA0VDE4OjUyOjU0KzAwMDAifQ.MF_Zeg7whvyk9gxs7oi3Gk9kdefg0WvlSNbSokasdRwCyQ');

$tokenRegister = new UserTokenRegister($apiContext);

// Registra token
$createToken = new Token();
$createToken->setId(2);

$returnCreateToken = $tokenRegister->createToken($createToken);
var_dump($returnCreateToken);

// Alterar token
$updateToken = new Token();
$updateToken->setId(2);
$updateToken->setToken('token1212erere21ere2r1e21re2');

$returnUpdateToken = $tokenRegister->updateToken($updateToken);
var_dump($returnUpdateToken);

// Delete token
$deleteToken = new Token();
$deleteToken->setId(2);
$deleteToken->setToken('token1212erere21ere2r1e21re2');

$returnDeleteToken = $tokenRegister->deleteToken($deleteToken);
var_dump($returnDeleteToken);

// Buscar token
$returnGetToken = $tokenRegister->getToken(1); // id Token
var_dump($returnGetToken);