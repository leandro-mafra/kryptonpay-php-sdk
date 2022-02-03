<?php

namespace KryptonPay\Api;

use KryptonPay\Service\Api\Client;
use KryptonPay\Service\Transaction\Module\CreditCard;
use KryptonPay\Service\Transaction\Module\SlipBank;

class KryptonPay
{
    public static function createPayment(ApiContext $apiContext)
    {
        $payment = null;
        switch ($apiContext->getTransaction()->getPaymentType()) {
            case ApiContext::SLIPBANK:
                $payment = new SlipBank($apiContext);
                break;
            case ApiContext::CREDIT_CARD:
                $payment = new CreditCard($apiContext);
                break;
        }

        $transaction = $payment->getDataTranform();
        $api = new Client($apiContext, 'POST', 'transactions');

        return $api->call($transaction);
    }

    public static function getTransaction(ApiContext $apiContext, int $idTransaction)
    {
        $api = new Client($apiContext, 'GET', sprintf('transactions?referencia=%s', $idTransaction));

        return $api->call();
    }
    
    public static function getTransactions(ApiContext $apiContext, array $filter)
    {
        $filters = [];
        if (isset($filter['dataPagamentoInicio']) && $filter['dataPagamentoInicio'] != '') {
            $filters['dataPagamentoInicio'] = $filter['dataPagamentoInicio'];
        }
        if (isset($filter['dataPagamentoFim']) && $filter['dataPagamentoFim'] != '') {
            $filters['dataPagamentoFim'] = $filter['dataPagamentoFim'];
        }
        if (isset($filter['limit']) && $filter['limit'] != '') {
            $filters['limit'] = $filter['limit'];
        }
        if (isset($filter['page']) && $filter['page'] != '') {
            $filters['page'] = $filter['page'];
        }

        $api = new Client($apiContext, 'GET', 'transactions?' . http_build_query($filters));

        return $api->call();
    }

    public static function openAccount(ApiContext $apiContext)
    {

        $openAccount = new \KryptonPay\Service\Transaction\Module\OpenAccount($apiContext);
        $data = $openAccount->getDataTranform();

        $api = new Client($apiContext, 'POST', 'users/openAccount');

        return $api->call($data);
    }

    public static function createApplication(ApiContext $apiContext, int $idContract)
    {

        $application = new \KryptonPay\Service\Transaction\Module\Application($apiContext);
        $data = $application->getDataTranform();

        $api = new Client($apiContext, 'POST', sprintf('contracts/%s/applications', $idContract));

        return $api->call($data);
    }
}
