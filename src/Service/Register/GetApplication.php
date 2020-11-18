<?php

namespace KryptonPay\Service\Register;

use KryptonPay\Api\ApiContext;
use KryptonPay\Api\KryptonPay;
use KryptonPay\Api\Application;
use stdclass;

class GetApplication
{
    protected $apiContext;
    protected $kryptonPay;
    protected $accountDate;

    public function __construct(ApiContext $apiContext)
    {
        $this->apiContext  = $apiContext;
        $this->kryptonPay  = new KryptonPay();        
        $this->application  = new Application();        
    }    

    public function executeListContracts($contractAll)
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

    public function executeListApplication($idApplication=null)
    {           
        $idContract = $this->executeListContracts(true);
        return $this->treatmentReturn($this->kryptonPay->listApplication($this->apiContext, $idContract, $idApplication));
    }   
    
    public function executeRegisterApplication($apiApplication)
    {                
        $idContract            = $this->executeListContracts(true);
        $objectApplication     = $this->application->translateFieldsApplication($apiApplication);
        $objectApplication->id = null;

        return $this->treatmentReturn($this->kryptonPay->postRegisterApplication($this->apiContext, $idContract, $objectApplication));
    } 

    public function executeEditApplication($data)
    {
        $idContract        = $this->executeListContracts(true);
        $objectApplication = $this->application->translateFieldsApplication($data);

        return $this->treatmentReturn($this->kryptonPay->putRegisterApplication($this->apiContext, $idContract, $objectApplication));
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
