<?php

use KryptonPay\Api\ApiContext;
use KryptonPay\Api\User;
use KryptonPay\Service\Register\UserRegister;

ini_set("display_errors", 1);
ini_set("display_startup_erros", 1);
error_reporting(E_ALL);

require_once 'vendor/autoload.php';

$apiContext = new ApiContext();
$apiContext->setIsSandbox(true);
$apiContext->setApiToken('eyJ0eXAiOiJKV1QiLCJhbGasdciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2FwaS5rcnlwdG9ucGF5LmNvbS5ici9asd1c2Vycy8yL3Rva2VuIiwiaWF0IjoxNTc1NDg1NTc0LCJasduYmYiOjE1NzU0ODU1NzQsImp0aSI6InBDeUdZS2ZkajlrOG44eWkiLCJzdWIiOjIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjciLCJsY2wiOiJwdC1iciIsInRrbiI6dHJ1ZSwiZGF0ZXRpbWUiOiIyMDE5LTEyLTA0VDE4OjUyOjU0KzAwMDAifQ.MF_Zeg7whvyk9gxs7oi3Gk9kdefg0WvlSNbSokasdRwCyQ');

$userRegister = new UserRegister($apiContext);

// Registrar user
$createUser = new User();
$createUser->setEmail('teste@gmail.com');
$createUser->setPassword('123');
$createUser->setNome('robson camilo');
$createUser->setIdGrupo(1);
$createUser->setCpfCnpj('09181444699');
$createUser->setHash(hash('sha512', '123'));

$returnCreateContract = $userRegister->createUser($createUser);
var_dump($returnCreateContract);

// Editar user
//$updateUser = new User();
//$updateUser->setId(186);
//$updateUser->setStatus(1);
//$updateUser->setNome('robson camilo teste');
//$updateUser->setIdGrupo(1);
//$updateUser->setIdioma('pt-br');
//
//$returnUpdateContract = $userRegister->updateUser($updateUser);
//var_dump($returnUpdateContract);

// Delete user
$deleteUser = new User();
$deleteUser->setId(186);

$returnDeleteUser = $userRegister->deleteUser($deleteUser);
var_dump($returnDeleteUser);

// Buscar user por id
//$getUserbyId = new User();
//$getUserbyId->setId(186);
//
//$returnGetUserById = $userRegister->getUserbyId($getUserbyId);
//var_dump($returnGetUserById);

// Buscar todos user
//$returnGetUserAll = $userRegister->getUserAll();
//var_dump($returnGetUserAll);