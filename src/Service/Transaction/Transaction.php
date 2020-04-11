<?php

namespace KryptonPay\Service\Transaction;

use KryptonPay\Api\ApiContext;
use KryptonPay\Models\Transaction\Itens;
use KryptonPay\Models\Transaction\Transacao;

class Transaction
{
    protected $transaction;

    public function __construct(ApiContext $apiContext)
    {
        $this->apiContext = $apiContext;
        $this->transacao = new Transacao();
        $this->setModels();
    }

    protected function setModels()
    {
        $this->transacao->tipoPagamento = $this->apiContext->getTransaction()->getPaymentType();
        $this->transacao->referencia = $this->apiContext->getTransaction()->getReference();

        $this->setModelPayer();
        $this->setModelAddress();
        $this->setModelItens();
        $this->setModelSplit();
    }

    protected function setModelPayer()
    {
        $this->transacao->pagador->tipo = $this->apiContext->getTransaction()->getPayer()->getType();
        $this->transacao->pagador->nome = $this->apiContext->getTransaction()->getPayer()->getName();
        $this->transacao->pagador->email = $this->apiContext->getTransaction()->getPayer()->getEmail();
        $this->transacao->pagador->celular = $this->apiContext->getTransaction()->getPayer()->getPhone();

        if ($this->apiContext->getTransaction()->getPayer()->getType() == ApiContext::PERSON_NATURAL) {
            $this->transacao->pagador->cpf = $this->apiContext->getTransaction()->getPayer()->getIdentity();
            $this->transacao->pagador->dataNascimento = $this->apiContext->getTransaction()->getPayer()->getBirthDate();
        } else {
            $this->transacao->pagador->cnpj = $this->apiContext->getTransaction()->getPayer()->getIdentity();
            $this->transacao->pagador->nomeFantasia = $this->apiContext->getTransaction()->getPayer()->getFantasyName();
        }
    }

    protected function setModelAddress()
    {
        $address = $this->apiContext->getTransaction()->getPayer()->getAddress();

        $this->transacao->pagador->endereco->logradouro = $address->getStreet();
        $this->transacao->pagador->endereco->numero = $address->getNumber();
        $this->transacao->pagador->endereco->bairro = $address->getDistrict();
        $this->transacao->pagador->endereco->cep = $address->getZipCode();
        $this->transacao->pagador->endereco->complemento = $address->getComplement();
        $this->transacao->pagador->endereco->cidade = $address->getStateInitials();
        $this->transacao->pagador->endereco->uf = $address->getCityName();
        $this->transacao->pagador->endereco->pais = $address->getCountryName();
    }

    protected function setModelItens()
    {
        foreach ($this->apiContext->getTransaction()->getItem() as $item) {
            $mdlItem = new Itens();
            $mdlItem->codigo = $item->getCode();
            $mdlItem->descricao = $item->getDescription();
            $mdlItem->valorUnitario = $item->getUnitPrice();
            $mdlItem->quantidade = $item->getQuantity();
            $this->transacao->itens[] = $mdlItem;
        }
    }

    protected function setModelSplit()
    {
        if (empty($this->apiContext->getTransaction()->getSplit())) {
            unset($this->transacao->split);
        }

        foreach ($this->apiContext->getTransaction()->getSplit() as $key => $split) {
            $this->transacao->split[$key]['documento'] = $split->getDocument();
            if ($split->getValue()) {
                $this->transacao->split[$key]['valor'] = $split->getValue();
            } else {
                $this->transacao->split[$key]['taxa'] = $split->getTax();
            }
        }
    }
}
