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

    public static function getTransaction(ApiContext $apiContext, int $Transaction)
    {
        $api = new Client($apiContext, 'GET', sprintf('transactions?referencia=%s', $Transaction));

        return $api->call();
    }

    public static function getId(ApiContext $apiContext, int $id)
    {
        $api = new Client($apiContext, 'GET', sprintf('transactions?id=%s', $id));

        return $api->call();
    }   

    public static function createAccount(ApiContext $apiContext, $data)
    {     
        $api    = new Client($apiContext, 'POST', 'users/openAccount');       

        return $api->call($data);
    }

    public static function listContracts(ApiContext $apiContext)
    {
        $api = new Client($apiContext, 'GET', 'contracts');

        return $api->call();
    }

    public static function postRegisterApplication(ApiContext $apiContext, $idContract, $data)
    {     
        $api = new Client($apiContext, 'POST', sprintf('contracts/%s/applications', $idContract));

        return $api->call($data);
    } 
    
    public static function listApplication(ApiContext $apiContext, $idContract, $idApplication)
    {
        $api = new Client($apiContext, 'GET', sprintf('contracts/%s/applications/%s', $idContract, $idApplication));

        return $api->call();
    }  

    public static function putRegisterApplication(ApiContext $apiContext, $idContract, $data)
    {
        $api = new Client($apiContext, 'PUT', sprintf('contracts/%s/applications/%s', $idContract, $data->id));

        return $api->call($data);
    }

    public static function postRegisterTable(ApiContext $apiContext, $data)
    {
        $api = new Client($apiContext, 'POST', 'tables');

        return $api->call($data);
    }

    public static function postRegisterTableServices(ApiContext $apiContext, $data)
    {
        $api = new Client($apiContext, 'POST', sprintf('tables/%s/services', $data->idTabela));

        return $api->call($data);
    }

    public static function postRegisterServicesTableInstallment(ApiContext $apiContext, $data)
    {
        $api = new Client($apiContext, 'POST', sprintf('tables/%s/services-installment', $data->idTabela));

        return $api->call($data);
    }

    public static function putEditTable(ApiContext $apiContext, $data)
    {
        $api = new Client($apiContext, 'PUT', sprintf('tables/%s', $data->id));

        return $api->call($data);
    }

    public static function putEditServiceTable(ApiContext $apiContext, $data)
    {
        $api = new Client($apiContext, 'PUT', sprintf('tables/%s/services', $data->idTabela));

        return $api->call($data);
    }

    public static function putEditServiceTableInstallment(ApiContext $apiContext, $data, $idTable)
    {
        $api = new Client($apiContext, 'PUT', sprintf('tables/%s/services-installment/%s', $idTable, $data->id));

        return $api->call($data);
    }
}
