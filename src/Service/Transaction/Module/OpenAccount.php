<?php
/**
 * Created by PhpStorm.
 * User: Guilherme Viana <guilhermecfviana@gmail.com>
 * Date: 11/08/2021
 * Time: 14:24
 */

namespace KryptonPay\Service\Transaction\Module;

use KryptonPay\Api\ApiContext;
use KryptonPay\Service\Transaction\OpenAccount as ServiceOpenAccount;

class OpenAccount extends ServiceOpenAccount
{

    protected $data;

    public function __construct(ApiContext $apiContext)
    {
        $this->data = new \KryptonPay\Models\Transaction\OpenAccount();
        parent::__construct($apiContext);
    }

    public function getDataTranform()
    {
        return $this->data;
    }

}