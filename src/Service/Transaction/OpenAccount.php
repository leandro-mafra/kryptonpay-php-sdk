<?php
/**
 * Created by PhpStorm.
 * User: Guilherme Viana <guilhermecfviana@gmail.com>
 * Date: 11/08/2021
 * Time: 14:10
 */

namespace KryptonPay\Service\Transaction;

use KryptonPay\Api\ApiContext;

class OpenAccount
{

    protected $apiContext;
    protected $data;

    public function __construct(ApiContext $apiContext)
    {
        $this->apiContext = $apiContext;
        $this->data = new \KryptonPay\Models\Transaction\OpenAccount();
        $this->setModels();
    }

    protected function setModels()
    {
        $this->setModelPerson();
        $this->setModelAddress();
        $this->setModelContract();
        $this->setModelUser();
    }

    protected function setModelPerson()
    {
        $person = $this->apiContext->getOpenAccount()->getPerson();

        $this->data->pessoa->tipo = $person->getType();
        $this->data->pessoa->nome = $person->getName();
        $this->data->pessoa->email = $person->getEmail();

        if ($person->getType() == ApiContext::PERSON_NATURAL) {
            $this->data->pessoa->cpf = $person->getCpf();
            $this->data->pessoa->dataNascimento = $person->getBirthday();
        } else {
            $this->data->pessoa->cnpj = $person->getCnpj();
            $this->data->pessoa->nomeFantasia = $person->getFantasyName();

            $this->data->pessoa->responsavel->tipo = $person->getResponsible()->getType();
            $this->data->pessoa->responsavel->nome = $person->getResponsible()->getName();
            $this->data->pessoa->responsavel->email = $person->getResponsible()->getEmail();

        }
    }

    protected function setModelAddress()
    {
        $address = $this->apiContext->getOpenAccount()->getAddress();

        $this->data->endereco->logradouro = $address->getStreet();
        $this->data->endereco->numero = $address->getNumber();
        $this->data->endereco->bairro = $address->getDistrict();
        $this->data->endereco->cep = $address->getZipCode();
        $this->data->endereco->complemento = $address->getComplement();
        $this->data->endereco->cidade = $address->getCityName();
        $this->data->endereco->uf = $address->getStateInitials();
        $this->data->endereco->pais = $address->getCountryName();
        $this->data->endereco->idPais = $address->getIdCountry();
        $this->data->endereco->enderecoExterior = $address->getForeignAddress();
    }

    protected function setModelContract()
    {
        $contract = $this->apiContext->getOpenAccount()->getContract();

        $this->data->contrato->status = 1;
        $this->data->contrato->dataInicio = $contract->getStartDate();
        $this->data->contrato->dataValidade = $contract->getDueDate();
        $this->data->contrato->idTabela = $contract->getIdTable();
        $this->data->contrato->dadosBancarios->tipoConta = $contract->getBank()->getTypeAccount();
        $this->data->contrato->dadosBancarios->codigoBanco = $contract->getBank()->getBankCode();
        $this->data->contrato->dadosBancarios->agencia = $contract->getBank()->getAgency();
        $this->data->contrato->dadosBancarios->agenciaDigito = $contract->getBank()->getDigitAgency();
        $this->data->contrato->dadosBancarios->conta = $contract->getBank()->getAccountNumber();
        $this->data->contrato->dadosBancarios->contaDigito = $contract->getBank()->getDigitAccountNumber();
    }

    protected function setModelUser()
    {
        $user = $this->apiContext->getOpenAccount()->getUser();

        $this->data->usuario->email = $user->getEmail();
        $this->data->usuario->password = $user->getPassword();
        $this->data->usuario->hash = $user->getHash();
        $this->data->usuario->nome = $user->getName();
        $this->data->usuario->idioma = $user->getLanguage();
        $this->data->usuario->cpfCnpj = $user->getCpfCnpj();

    }

}