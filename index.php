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

$apiContext->setApiToken('eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vZ2F0ZXdheS1sb2NhbC1hcGkvbG9naW4iLCJpYXQiOjE2MTY0OTkxMDksIm5iZiI6MTYxNjQ5OTEwOSwianRpIjoiRE5OYlFCT0J6dWNMd3NXRiIsInN1YiI6MSwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyIsImxjbCI6InB0LWJyIiwidGtuIjpmYWxzZSwiZGF0ZXRpbWUiOiIyMDIxLTAzLTIzVDExOjMxOjQ5KzAwMDAifQ.Q8k_vyrYDA9MtRw_nAacXIV1aBM-5Bpwira-NVqSMak');

$person = new PersonRegister($apiContext);

// Registra pessoa
$createPerson = new Payer();
$createPerson->setTipo(2);
$createPerson->setNome('robson teste 01');
$createPerson->setEmail('teste124@hotmail.com');
$createPerson->setCpf('94612119029'); // Será usado se tipo 1
$createPerson->setCnpj('13796297000195'); // Será usado se tipo 2
$createPerson->setDataNascimento('01-07-1990');
$createPerson->setNomeFantasia('teste robson 2'); // Será usado se tipo 2

$returnCreatePerson = $person->createPerson($createPerson);
var_dump($returnCreatePerson);

// Busca pessoas
//$returnAllPersons = $person->allPersons();
//var_dump($returnAllPersons);