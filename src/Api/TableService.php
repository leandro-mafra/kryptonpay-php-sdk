<?php

namespace KryptonPay\Api;

use Stdclass;

class TableService
{
    private $idTableService;
    private $nameTableService;
    private $daysForPaymentTableService;
    private $replicateTaxTableService;
    private $statusTableService;
    private $taxTableService;
    private $installments;


    public function setNameTableService( string $nameTableService)
    {
        $this->nameTableService = $nameTableService;
    }

    public function setDaysForPaymentTableService( int $daysForPaymentTableService)
    {
        $this->daysForPaymentTableService = $daysForPaymentTableService;
    }

    public function setReplicateTaxTableService( bool $replicateTaxTableService)
    {
        $this->replicateTaxTableService = $replicateTaxTableService;
    }

    public function setStatusTableService( bool $statusTableService)
    {
        $this->statusTableService = $statusTableService;
    }

    public function setTaxTableService( float $taxTableService = null)
    {
        $this->taxTableService = $taxTableService;
    }

    public function setIdTableService( int $idTableService)
    {
        $this->idTableService = $idTableService;
    }

    public function addInstallments($serviceInstallments)
    {
        $this->installments = $serviceInstallments;
    }

    public function getInstallments()
    {
        return $this->installments;
    }

    public function getIdTableService()
    {
        return $this->idTableService;
    }

    public function getTaxTableService()
    {
        return $this->taxTableService;
    }

    public function getStatusTableService()
    {
        return $this->statusTableService;
    }

    public function getReplicateTaxTableService()
    {
        return $this->replicateTaxTableService;
    }

    public function getDaysForPaymentTableService()
    {
        return $this->daysForPaymentTableService;
    }

    public function getNameTableService()
    {
        return $this->nameTableService;
    }

    public function translateTableService($data, $services)
    {
        $newFieldsTableServices            = new StdClass();
        $newFieldsTableServices->id        = $data;
        $newFieldsTableServices->idTabela  = $data;
        $newFieldsTableServices->idServico = $this->translateTableServiceComplement($services);

        return $newFieldsTableServices;
    }

    public function translateTableServiceComplement($services)
    {
        $newFieldsTableService = [];
        $index = 0;
        foreach ($services as $service)
        {
            $newFieldsTableService[$index]                  = new StdClass();
            $newFieldsTableService[$index]->id              = $service->getIdTableService();
            $newFieldsTableService[$index]->diasRecebimento = $service->getDaysForPaymentTableService();
            $newFieldsTableService[$index]->replicaTaxa     = $service->getReplicateTaxTableService();
            $index++;
        }

        return $newFieldsTableService;
    }
}