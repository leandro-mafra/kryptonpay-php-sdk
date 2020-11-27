<?php

namespace KryptonPay\Api;

use StdClass;

class Table
{
    private $idTable;
    private $servicesTable = [];
    private $nameTable;
    private $descriptionTable;
    private $statusTable;

    public function setNameTable( string $nameTable)
    {
        $this->nameTable = $nameTable;
    }

    public function setDescriptionTable(string $descriptionTable)
    {
        $this->descriptionTable = $descriptionTable;
    }

    public function setStatusTable(int $statusTable)
    {
        $this->statusTable = $statusTable;
    }

    public function setServicesTable(array $servicesTable)
    {
        sort($servicesTable);
        $this->servicesTable = $servicesTable;
    }

    public function addServicesTable(int $serviceId, TableService $servicesTable)
    {
        $this->servicesTable[$serviceId] = $servicesTable;
    }

    public function setIdTable(int $idTable)
    {
        $this->idTable = $idTable;
    }

    public function getIdTable()
    {
        return $this->idTable;
    }

    public function getServicesTable()
    {
        return $this->servicesTable;
    }

    public function getNameTable()
    {
        return $this->nameTable;
    }

    public function getDescriptionTable()
    {
        return $this->descriptionTable;
    }

    public function getStatusTable()
    {
        return $this->statusTable;
    }

    public function translateFieldsTable($data, $edit)
    {
        $newFieldsTable            = new stdClass();
        $newFieldsTable->id        = $data->getIdTable();
        $newFieldsTable->nome      = $data->getNameTable();
        $newFieldsTable->descricao = $data->getDescriptionTable();
        $newFieldsTable->status    = $data->getStatusTable();

        return $newFieldsTable;
    }
}
