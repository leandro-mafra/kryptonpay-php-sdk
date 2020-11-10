<?php

namespace KryptonPay\Service\Transaction;

use KryptonPay\Api\ApiContext;
use KryptonPay\Api\KryptonPay;
use KryptonPay\Api\Transaction;

class GetTransaction extends Transaction
{
    protected $apiContext;
    protected $kryptonPay;

    public function __construct(ApiContext $apiContext)
    {
        $this->apiContext = $apiContext;
        $this->kryptonPay = new KryptonPay();
    }    

    public function executeByReference($PDF)
    {
        $transaction = $this->kryptonPay->getTransaction($this->apiContext, $this->getReference());
        unset($transaction->meta);

        $retornoArray = $this->retornoHmtlPdf($transaction, $PDF);
        return $retornoArray;        
    }

    public function executeById($PDF)
    {
        $transaction = $this->kryptonPay->getId($this->apiContext, $this->getId());
        unset($transaction->meta);

        $retornoArray = $this->retornoHmtlPdf($transaction, $PDF);
        return $retornoArray;
    }   

    public function retornoHmtlPdf($transaction, $pdf)
    {
        $transactionArray = (array) $transaction;
        $transactionArray = end($transactionArray);
        $linkParametro = ($pdf) ? "?pdf=true" : "";
        return [
            'url'     => $transactionArray->opcaoPagamento->url . $linkParametro,
            'retorno' => file_get_contents($transactionArray->opcaoPagamento->url . $linkParametro)
        ];          
    }
}
