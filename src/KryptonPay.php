<?php namespace KryptonPay;

use KryptonPay\Service\Api\Api;
use KryptonPay\Service\Transaction\Module\CreditCard;
use KryptonPay\Service\Transaction\Module\SlipBank;

class KryptonPay
{
    private $settings;

    public function __construct(object $settings)
    {
        $this->settings = $settings;
    }

    public function genereteSlipBank(array $data)
    {
        $slipBankRepo = new SlipBank($data);
        $dataSlipBank = $slipBankRepo->getData();

        $api = new Api($this->settings, 'POST', 'transactions');
        return $api->send($dataSlipBank);
    }

    public function getTransaction(int $id)
    {
        $api = new Api($this->settings, 'GET', 'transactions?referencia=' . $id);
        return $api->send();

    }

    public function generateTransactionCreditCard(array $data)
    {
        $slipBankRepo = new CreditCard($data);
        $transaction = $slipBankRepo->getData();

        $api = new Api($this->settings, 'POST', 'transactions');
        return $api->send($transaction);
    }
}
