<?php

namespace KryptonPay\Service\Register;

use KryptonPay\Api\ApiContext;
use KryptonPay\Api\KryptonPay;
use KryptonPay\Api\InstallmentsTax;
use KryptonPay\Api\TableService;
use KryptonPay\Api\Table as ApiTable;
use StdClass;

class Table
{
    const CREDIT_CARD = 2;
    const PIX         = 3;

    protected $apiContext;
    protected $kryptonPay;
    protected $table;
    protected $tableService;
    protected $installmentsTax;

    public function __construct(ApiContext $apiContext)
    {
        $this->apiContext      = $apiContext;
        $this->kryptonPay      = new KryptonPay();
        $this->installmentsTax = new InstallmentsTax();
        $this->tableService    = new TableService();
        $this->table           = new ApiTable();
    }

    public function executeNewTable($table)
    {
        $edit = $table->getIdTable() ? true : false;
        $newEditTable = $this->table->translateFieldsTable($table, $edit);
        $idTable = $edit == true ? $this->kryptonPay->putEditTable($this->apiContext, $newEditTable)
                                 : $this->kryptonPay->postRegisterTable($this->apiContext, $newEditTable);

        $this->returnCheck($idTable);

        $newEditTableServices = $this->tableService->translateTableService($edit == true ? $table->getIdTable() : $idTable->id,
                                                                           $table->getServicesTable());

        $edit == true ? $this->kryptonPay->putEditServiceTable($this->apiContext, $newEditTableServices)
                      : $this->kryptonPay->postRegisterTableServices($this->apiContext, $newEditTableServices);

        $this->returnCheck($edit);

        return $this->executeServiceTableInstallment($edit == true ? $table->getIdTable() : $idTable->id, $table->getServicesTable(), $edit);
    }

    public function executeServiceTableInstallment($idTable, $services, $edit)
    {

        foreach ($services as $service) {
            $createEditTableServicesInstallment            = new StdClass();
            $createEditTableServicesInstallment->id        = $service->getIdTableService();
            $createEditTableServicesInstallment->idTabela  = $idTable;
            $createEditTableServicesInstallment->idServico = $service->getIdTableService();

            if($service->getIdTableService() == self::CREDIT_CARD) {
                if ($service->getInstallments()){
                    foreach ($service->getInstallments() as $key => $installment) {
                        $createEditTableServicesInstallment->parcela[$key]         = new StdClass();
                        $createEditTableServicesInstallment->parcela[$key]->numero = $key + 1;
                        $createEditTableServicesInstallment->parcela[$key]->taxa   = $installment;
                    }
                }
            } else {
                $createEditTableServicesInstallment->parcela[]          = new StdClass();
                $createEditTableServicesInstallment->parcela[0]->numero = 1;
                $createEditTableServicesInstallment->parcela[0]->{$service->getIdTableService() == self::PIX ? 'taxa': 'valor'} = $service->getTaxTableService();
            }

            $return = ($edit == true) ? $this->kryptonPay->putEditServiceTableInstallment($this->apiContext, $createEditTableServicesInstallment, $idTable)
                                      : $this->kryptonPay->postRegisterServicesTableInstallment($this->apiContext, $createEditTableServicesInstallment);

            $this->returnCheck($return);
        }
        return $this->treatmentReturn($idTable);
    }

    public function returnCheck($data)
    {
        if(isset($data->code))
        {
           $this->treatmentReturn($data);
        }
    }

    public function treatmentReturn($data)
    {
        if(($data == !null) || !isset($data->code))
        {
            if(!empty($data->code))
            {
                if ($data->code <> 200 || 201 || 204)
                {
                    $arrayData           = new stdclass();
                    $arrayData->code     = $data->code;
                    $arrayData->messages = $data->messages;
                    var_dump($arrayData);
                    die();
                }
            }

            $arrayData           = new stdclass();
            $arrayData->code     = 200;
            $arrayData->messages = 'Operação realizada com sucesso!';

            if($data == !null)
                $arrayData->parameters = $data;

            return $arrayData;
        }else
        {
            return $data;
        }
    }
}
