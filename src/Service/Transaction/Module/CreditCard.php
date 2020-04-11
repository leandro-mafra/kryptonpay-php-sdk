<?php namespace KryptonPay\Service\Transaction\Module;

use KryptonPay\Api\ApiContext;
use KryptonPay\Service\Transaction\Transaction;

class CreditCard extends Transaction
{
    private $creditCard;
    private $creditCardAddress;

    public function __construct(ApiContext $apiContext)
    {
        parent::__construct($apiContext);
        $this->creditCard = $apiContext->getTransaction()->getCreditCard();
        $this->creditCardAddress = $apiContext->getTransaction()->getCreditCard()->getAddress();
    }

    public function getDataTranform()
    {
        $this->transacao->cartao->credito->valor = $this->creditCard->getValue();
        $this->transacao->cartao->credito->numeroParcelas = $this->creditCard->getNumberInstallments();
        $this->transacao->cartao->credito->dataVencimento = $this->creditCard->getExpirationDate();
        $this->transacao->cartao->credito->descricao = $this->creditCard->getSaleDescription();
        $this->transacao->cartao->credito->numeroCartao = $this->creditCard->getCardNumber();
        $this->transacao->cartao->credito->primeiroNome = $this->creditCard->getFirstName();
        $this->transacao->cartao->credito->ultimoNome = $this->creditCard->getLastName();
        $this->transacao->cartao->credito->nomeTitular = $this->creditCard->getCardholder();
        $this->transacao->cartao->credito->codigoSeguranca = $this->creditCard->getSecurityCode();
        $this->transacao->cartao->credito->mesExpiracao = $this->creditCard->getMonthExpiration();
        $this->transacao->cartao->credito->anoExpiracao = $this->creditCard->getYearExpiration();

        $this->transacao->cartao->credito->endereco->logradouro = $this->creditCardAddress->getStreet();
        $this->transacao->cartao->credito->endereco->numero = $this->creditCardAddress->getNumber();
        $this->transacao->cartao->credito->endereco->bairro = $this->creditCardAddress->getDistrict();
        $this->transacao->cartao->credito->endereco->cep = $this->creditCardAddress->getZipCode();
        $this->transacao->cartao->credito->endereco->complemento = $this->creditCardAddress->getComplement();
        $this->transacao->cartao->credito->endereco->uf = $this->creditCardAddress->getStateInitials();
        $this->transacao->cartao->credito->endereco->cidade = $this->creditCardAddress->getCityName();
        $this->transacao->cartao->credito->endereco->pais = $this->creditCardAddress->getCountryName();

        unset($this->transacao->cartao->debito);
        unset($this->transacao->boleto);

        return $this->transacao;
    }
}
