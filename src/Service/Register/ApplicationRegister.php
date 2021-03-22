<?php

namespace KryptonPay\Service\Register;

use KryptonPay\Api\ApiContext;
use KryptonPay\Api\KryptonPay;
use KryptonPay\Api\Application;
use stdclass;

class ApplicationRegister
{
    protected $apiContext;
    protected $kryptonPay;
    protected $application;

    public function __construct(ApiContext $apiContext)
    {
        $this->apiContext  = $apiContext;
        $this->kryptonPay  = new KryptonPay();        
        $this->application  = new Application();
    }    

    public function listContracts($contractAll)
    {           
        $contract = (array) $this->kryptonPay->listContracts($this->apiContext);

        if($contractAll)
        {
            return $contract[0]->id;
        }else
        {
            return $contract[0];
        }        
    }

    public function getApplicationIdOrAll($idContract, $idApplication = null)
    {
        if($idApplication == null)
            return $this->treatmentReturn($this->kryptonPay->getApplicationAll($this->apiContext, $idContract));
        else
            return $this->treatmentReturn($this->kryptonPay->getApplicationByContract($this->apiContext, $idContract, $idApplication));
    }

    public function createApplication($data)
    {
        return $this->treatmentReturn($this->kryptonPay->createApplication($this->apiContext, $data));
    } 

    public function editApplication($data)
    {
        return $this->treatmentReturn($this->kryptonPay->editApplication($this->apiContext, $data));
    }

    public function treatmentReturn($data)
    {
        if(!isset($data->code))
        {
            $arrayData           = new stdclass();
            $arrayData->code     = 200;
            $arrayData->messages = 'Operação realizada com sucesso!';

            if(get_object_vars($data) == !null)
            $arrayData->parameters     = $data;

            return $arrayData;
        }
        return $data;
    }
}
