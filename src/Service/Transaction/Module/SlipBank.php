<?php

namespace KryptonPay\Service\Transaction\Module;

use KryptonPay\Api\ApiContext;
use KryptonPay\Service\Transaction\Transaction;

class SlipBank extends Transaction
{
    private $slipBank;

    public function __construct(ApiContext $apiContext)
    {
        parent::__construct($apiContext);
        $this->slipBank = $apiContext->getTransaction()->getSlip();
    }

    public function getDataTranform()
    {
        $this->transacao->boleto->valor = $this->slipBank->getValue();
        $this->transacao->boleto->valorDesconto = $this->slipBank->getDiscountValue();
        $this->transacao->boleto->dataVencimento = $this->slipBank->getDueDate();
        $this->transacao->boleto->porcentagemMulta = $this->slipBank->getPenaltyRate();
        $this->transacao->boleto->dataMulta = $this->slipBank->getPenaltyDate();
        $this->transacao->boleto->dataDesconto = $this->slipBank->getDiscountLimitDate();
        $this->transacao->boleto->porcentagemJuros = $this->slipBank->getInterestRate();
        $this->transacao->boleto->instrucoes = $this->slipBank->getInstruction();

        if (!empty($this->slipBank->getObservation())) {
            foreach ($this->slipBank->getObservation() as $key => $observation) {
                $this->transacao->boleto->observacoes[$key] = (!empty($observation)) ? (string) $observation : null;
            }
        }

        unset($this->transacao->cartao->debito);
        unset($this->transacao->cartao->credito);

        return $this->transacao;
    }
}
