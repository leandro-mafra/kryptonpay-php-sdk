<?php

namespace KryptonPay\Service\Transaction\Module;

use KryptonPay\Api\ApiContext;
use KryptonPay\Service\Transaction\Transaction;

class Pix extends Transaction
{
    private $pix;
    private $calendar;

    public function __construct(ApiContext $apiContext)
    {
        parent::__construct($apiContext);
        $this->pix = $apiContext->getTransaction()->getPix();
        $this->calendar = $apiContext->getTransaction()->getPix()->getCalendar();
    }

    public function getDataTranform()
    {
        $this->transacao->pix->valor = $this->pix->getValue();
        $this->transacao->pix->solicitacaoPagador = $this->pix->getPayerRequest();

        $this->transacao->pix->calendario->dataVencimento = $this->calendar->getDueDate();

        return $this->transacao;
    }
}
