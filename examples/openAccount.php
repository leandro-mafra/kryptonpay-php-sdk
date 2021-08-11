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

// Objeto OpenAccount
$openAccount = new \KryptonPay\Api\OpenAccount();

// Dados Pessoa
$person = new \KryptonPay\Api\Person();
$person->setType(2);
$person->setName('Razão Social');
$person->setEmail('email@email.com.br');
$person->setCnpj('10178670000156');
$person->setFantasyName('Nome Fantasia');

// Dados Responsavel
$responsible = new \KryptonPay\Api\Responsible();
$responsible->setType(1);
$responsible->setName('Nome');
$responsible->setEmail('emailuser@email.com.br');
$responsible->setCpf('44279028044');
$responsible->setBirthday('1985-12-20');

$person->setResponsible($responsible);
$openAccount->setPerson($person);

// Dados Usuário
$user = new \KryptonPay\Api\User();
$user->setName('Nome');
$user->setPassword(hash('sha512', 'stringdasenha'));
$user->setHash(hash('sha512', 'stringdohash'));
$user->setEmail('emailuser@email.com.br');
$user->setLanguage('pt-br');
$user->setCpfCnpj('44279028044');

$openAccount->setUser($user);

// Dados Endereço
$address = new \KryptonPay\Api\Address();
$address->setStreet('Rua');
$address->setNumber('123');
$address->setDistrict('Bairro');
$address->setZipCode('31310640');
$address->setComplement('complemento');
$address->setIdCountry(50);
$address->setForeignAddress(false);

$openAccount->setAddress($address);

// Dados Contrato
$contract = new \KryptonPay\Api\Contract();
$contract->setStartDate((new DateTime())->format('Y-m-d'));
$contract->setDueDate(((new DateTime())->add((new DateInterval('P1Y'))))->format('Y-m-d'));
$contract->setIdTable(44);

// Dados Bancários
$bank = new \KryptonPay\Api\Bank();
$bank->setTypeAccount('1212');
$bank->setBankCode('077');
$bank->setAgency('0001');
$bank->setDigitAgency(9);
$bank->setAccountNumber('0123456');
$bank->setDigitAccountNumber(5);
// $bank->setOperation('123');

$contract->setBank($bank);
$openAccount->setContract($contract);

$apiContext->setOpenAccount($openAccount);
$return = \KryptonPay\Api\KryptonPay::openAccount($apiContext);

print_r($return);

