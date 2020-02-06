<?php namespace KryptonPay\Service\Transaction\Module;

use Carbon\Carbon;
use KryptonPay\Helpers\Util;
use KryptonPay\Service\Transaction\Transaction;

class CreditCard extends Transaction
{
    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->setModelPaymentOptions();
    }

    public function getData()
    {
        return $this->transacao;
    }

    private function setModelPaymentOptions(): void
    {
        $this->transacao->cartao->credito->valor = (!empty($this->data['cartao']['credito']['valor'])) ? (float) Util::numberFormat($this->data['cartao']['credito']['valor']) : null;
        $this->transacao->cartao->credito->numeroParcelas = (!empty($this->data['cartao']['credito']['numeroParcelas'])) ? (int) Util::numberFormat($this->data['cartao']['credito']['numeroParcelas']) : null;
        $this->transacao->cartao->credito->dataVencimento = (!empty($this->data['cartao']['credito']['dataVencimento'])) ? (string) Carbon::createFromFormat('d/m/Y', $this->data['cartao']['credito']['dataVencimento'])->format('Y-m-d') : null;
        $this->transacao->cartao->credito->descricao = (!empty($this->data['cartao']['credito']['descricao'])) ? (string) $this->data['cartao']['credito']['descricao'] : null;
        $this->transacao->cartao->credito->numeroCartao = (!empty($this->data['cartao']['credito']['numeroCartao'])) ? (string) $this->data['cartao']['credito']['numeroCartao'] : null;
        $this->transacao->cartao->credito->primeiroNome = (!empty($this->data['cartao']['credito']['primeiroNome'])) ? (string) $this->data['cartao']['credito']['primeiroNome'] : null;
        $this->transacao->cartao->credito->ultimoNome = (!empty($this->data['cartao']['credito']['ultimoNome'])) ? (string) $this->data['cartao']['credito']['ultimoNome'] : null;
        $this->transacao->cartao->credito->nomeTitular = (!empty($this->data['cartao']['credito']['nomeTitular'])) ? (string) $this->data['cartao']['credito']['nomeTitular'] : null;
        $this->transacao->cartao->credito->codigoSeguranca = (!empty($this->data['cartao']['credito']['codigoSeguranca'])) ? (int) $this->data['cartao']['credito']['codigoSeguranca'] : null;
        $this->transacao->cartao->credito->mesExpiracao = (!empty($this->data['cartao']['credito']['mesExpiracao'])) ? (string) $this->data['cartao']['credito']['mesExpiracao'] : null;
        $this->transacao->cartao->credito->anoExpiracao = (!empty($this->data['cartao']['credito']['anoExpiracao'])) ? (string) $this->data['cartao']['credito']['anoExpiracao'] : null;
        //endereco
        $this->transacao->cartao->credito->endereco->logradouro = (!empty($this->data['cartao']['credito']['endereco']['logradouro'])) ? (string) $this->data['cartao']['credito']['endereco']['logradouro'] : null;
        $this->transacao->cartao->credito->endereco->numero = (!empty($this->data['cartao']['credito']['endereco']['numero'])) ? (string) $this->data['cartao']['credito']['endereco']['numero'] : null;
        $this->transacao->cartao->credito->endereco->bairro = (!empty($this->data['cartao']['credito']['endereco']['bairro'])) ? (string) $this->data['cartao']['credito']['endereco']['bairro'] : null;
        $this->transacao->cartao->credito->endereco->cep = (!empty($this->data['cartao']['credito']['endereco']['cep'])) ? (string) Util::removerMaskCep($this->data['cartao']['credito']['endereco']['cep']) : null;
        $this->transacao->cartao->credito->endereco->complemento = (!empty($this->data['cartao']['credito']['endereco']['complemento'])) ? (string) $this->data['cartao']['credito']['endereco']['complemento'] : null;
        $this->transacao->cartao->credito->endereco->uf = (!empty($this->data['cartao']['credito']['endereco']['uf'])) ? (string) $this->data['cartao']['credito']['endereco']['uf'] : null;
        $this->transacao->cartao->credito->endereco->cidade = (!empty($this->data['cartao']['credito']['endereco']['cidade'])) ? (string) $this->data['cartao']['credito']['endereco']['cidade'] : null;
        $this->transacao->cartao->credito->endereco->pais = (!empty($this->data['cartao']['credito']['endereco']['pais'])) ? (string) $this->data['cartao']['credito']['endereco']['pais'] : null;

    }
}
