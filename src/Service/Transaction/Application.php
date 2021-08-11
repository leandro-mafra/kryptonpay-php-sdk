<?php
/**
 * Created by PhpStorm.
 * User: Guilherme Viana <guilhermecfviana@gmail.com>
 * Date: 11/08/2021
 * Time: 14:10
 */

namespace KryptonPay\Service\Transaction;

use KryptonPay\Api\ApiContext;

class Application
{

    protected $apiContext;
    protected $data;

    public function __construct(ApiContext $apiContext)
    {
        $this->apiContext = $apiContext;
        $this->data = new \KryptonPay\Models\Transaction\Application();
        $this->setModels();
    }

    protected function setModels()
    {
        $this->setModelApplication();
    }

    protected function setModelApplication()
    {
        $application = $this->apiContext->getApplication();

        $this->data->nome = $application->getName();
        $this->data->url = $application->getUrl();
        $this->data->default = $application->getDefault();
        $this->data->applicationKey = $application->getApplicationKey();

    }

}