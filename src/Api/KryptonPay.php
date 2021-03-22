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

    public static function createPerson(ApiContext $apiContext, $data)
    {     
        $api = new Client($apiContext, 'POST', 'persons');
        return $api->call($data);
    }

    public static function allPersons(ApiContext $apiContext)
    {
        $api = new Client($apiContext, 'GET', 'persons');
        return $api->call();
    }

    public static function createContract(ApiContext $apiContext, $data)
    {
        $api = new Client($apiContext, 'POST', 'contracts');
        return $api->call($data);
    }

    public static function updateContract(ApiContext $apiContext, $data)
    {
        $api = new Client($apiContext, 'PUT', 'contracts/' . $data->getId());
        return $api->call($data);
    }

    public static function getContract(ApiContext $apiContext, $data)
    {
        $api = new Client($apiContext, 'GET', 'contracts/' . $data->getId());
        return $api->call($data);
    }

    public static function allContracts(ApiContext $apiContext)
    {
        $api = new Client($apiContext, 'GET', 'contracts');
        return $api->call();
    }

    public static function getToken(ApiContext $apiContext, $id)
    {
        $api = new Client($apiContext, 'GET', 'users/' . $id . '/token');
        return $api->call();
    }

    public static function createToken(ApiContext $apiContext, $id)
    {
        $api = new Client($apiContext, 'POST', 'users/' . $id->getId() . '/token');
        return $api->call($id);
    }

    public static function updateToken(ApiContext $apiContext, $data)
    {
        $api = new Client($apiContext, 'PUT', 'users/' . $data->getId() . '/token');
        return $api->call($data);
    }

    public static function deleteToken(ApiContext $apiContext, $data)
    {
        $api = new Client($apiContext, 'DELETE', 'users/' . $data->getId() . '/token/' . $data->getToken());
        return $api->call($data);
    }

    public static function createApplication(ApiContext $apiContext, $data)
    {
        $api = new Client($apiContext, 'POST', sprintf('contracts/%s/applications', $data->getContract()));
        return $api->call($data);
    }

    public static function editApplication(ApiContext $apiContext, $data)
    {
        $api = new Client($apiContext, 'PUT', sprintf('contracts/%s/applications/%s', $data->getContract(), $data->getId()));
        return $api->call($data);
    }

    public static function getApplicationAll(ApiContext $apiContext, $idContract)
    {
        $api = new Client($apiContext, 'GET', sprintf('contracts/%s/applications/', $idContract));
        return $api->call();
    }

    public static function getApplicationByContract(ApiContext $apiContext, $idContract, $idApplication)
    {
        $api = new Client($apiContext, 'GET', sprintf('contracts/%s/applications/%s', $idContract, $idApplication));
        return $api->call();
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

    public static function createAccount(ApiContext $apiContext, $data)
    {
        $api = new Client($apiContext, 'POST', 'users/openAccount');
        return $api->call($data);
    }

    public static function createUser(ApiContext $apiContext, $data)
    {
        $api = new Client($apiContext, 'POST', 'users');
        return $api->call($data);
    }

    public static function updateUser(ApiContext $apiContext, $data)
    {
        $api = new Client($apiContext, 'PUT', 'users/' . $data->getId());
        return $api->call($data);
    }

    public static function deleteUser(ApiContext $apiContext, $data)
    {
        $api = new Client($apiContext, 'DELETE', 'users/' . $data->getId());
        return $api->call();
    }

    public static function getUserById(ApiContext $apiContext, $data)
    {
        $api = new Client($apiContext, 'GET', 'users/' . $data->getId());
        return $api->call();
    }

    public static function getUserAll(ApiContext $apiContext)
    {
        $api = new Client($apiContext, 'GET', 'users');
        return $api->call();
    }
}
