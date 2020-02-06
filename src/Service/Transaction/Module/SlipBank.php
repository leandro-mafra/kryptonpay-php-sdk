<?php namespace KryptonPay\Service\Transaction\Module;

use Carbon\Carbon;
use KryptonPay\Helpers\Util;
use KryptonPay\Models\Transaction\Boleto;
use KryptonPay\Service\Transaction\Transaction;

class SlipBank extends Transaction
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
        $this->transacao->boleto->valor = (!empty($this->data['boleto']['valor'])) ? (int) Util::numberFormat($this->data['boleto']['valor']) : null;
        $this->transacao->boleto->valorDesconto = (!empty($this->data['boleto']['valorDesconto'])) ? (int) Util::numberFormat($this->data['boleto']['valorDesconto']) : null;
        $this->transacao->boleto->dataVencimento = (!empty($this->data['boleto']['dataVencimento'])) ? (string) Carbon::createFromFormat('d/m/Y', $this->data['boleto']['dataVencimento'])->format('Y-m-d') : null;
        $this->transacao->boleto->pagamentoParcial = (!empty($this->data['boleto']['pagamentoParcial'])) ? (bool) $this->data['boleto']['pagamentoParcial'] : null;
        $this->transacao->boleto->cancelarAposVencimento = (!empty($this->data['boleto']['cancelarAposVencimento'])) ? (bool) $this->data['boleto']['cancelarAposVencimento'] : null;
        $this->transacao->boleto->porcentagemMulta = (!empty($this->data['boleto']['porcentagemMulta'])) ? (float) $this->data['boleto']['porcentagemMulta'] : null;
        $this->transacao->boleto->dataMulta = (!empty($this->data['boleto']['dataMulta'])) ? (string) Carbon::createFromFormat('d/m/Y', $this->data['boleto']['dataVencimento'])->format('Y-m-d') : null;
        $this->transacao->boleto->dataDesconto = (!empty($this->data['boleto']['dataDesconto'])) ? (string) Carbon::createFromFormat('d/m/Y', $this->data['boleto']['dataDesconto'])->format('Y-m-d') : null;
        $this->transacao->boleto->porcentagemJuros = (!empty($this->data['boleto']['porcentagemJuros'])) ? (float) $this->data['boleto']['porcentagemJuros'] : null;
        $this->transacao->boleto->instrucoes = (!empty($this->data['boleto']['instrucoes'])) ? (string) $this->data['boleto']['instrucoes'] : null;

        if (!empty($this->data['boleto']['observacoes']) && is_array($this->data['boleto']['observacoes'])) {
            foreach ($this->data['boleto']['observacoes'] as $key => $comment) {
                $this->transacao->boleto->observacoes[$key] = (!empty($comment)) ? (string) $comment : null;
            }
        }
    }
}
