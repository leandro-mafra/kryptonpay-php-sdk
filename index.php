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
$apiContext->setApiToken('eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vZ2F0ZXdheS1sb2NhbC1hcGkvbG9naW4iLCJpYXQiOjE2MTY0NDA5MjIsIm5iZiI6MTYxNjQ0MDkyMiwianRpIjoidkM0b0lJN213WWM4c1dHYSIsInN1YiI6MSwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyIsImxjbCI6InB0LWJyIiwidGtuIjpmYWxzZSwiZGF0ZXRpbWUiOiIyMDIxLTAzLTIyVDE5OjIyOjAxKzAwMDAifQ.y9cdDBBOOKXgC16eFUKZXe1ovnXoKnXBnW_CtEevcn8');

$userRegister = new UserRegister($apiContext);

// Registrar user
//$createUser = new User();
//$createUser->setEmail('teste@gmail.com');
//$createUser->setPassword('123');
//$createUser->setNome('robson camilo');
//$createUser->setIdGrupo(1);
//$createUser->setCpfCnpj('86735737008');
//$createUser->setHash(hash('sha512', '123'));
//
//$returnCreateContract = $userRegister->createUser($createUser);
//var_dump($returnCreateContract);

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
$deleteUser->setId(209);

$returnDeleteUser = $userRegister->deleteUser($deleteUser);
var_dump($returnDeleteUser);

// Buscar user por id
//$getUserbyId = new User();
//$getUserbyId->setId(209);
//
//$returnGetUserById = $userRegister->getUserbyId($getUserbyId);
//var_dump($returnGetUserById);

// Buscar todos user
//$returnGetUserAll = $userRegister->getUserAll();
//var_dump($returnGetUserAll);
