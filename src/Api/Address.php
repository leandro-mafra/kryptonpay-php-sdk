<?php

namespace KryptonPay\Api;

use stdClass;

class Address extends DefaultModel
{
    private $street;
    private $number;
    private $district;
    private $zipCode;
    private $complement;
    private $stateInitials;
    private $cityName;
    private $countryName;
    private $idNation;
    private $outsideAddress;


    public function setStreet($street)
    {
        $this->street = $street;
    }

    public function setNumber($number)
    {
        $this->number = $number;
    }

    public function setDistrict($district)
    {
        $this->district = $district;
    }

    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;
    }

    public function setComplement($complement = null)
    {
        $this->complement = $complement;
    }

    public function setStateInitials($stateInitials)
    {
        $this->stateInitials = $stateInitials;
    }

    public function setCityName($cityName)
    {
        $this->cityName = $cityName;
    }

    public function setCountryName($countryName)
    {
        $this->countryName = $countryName;
    }

    public function setIdNation($idNation)
    {
        $this->idNation = $idNation;
    }

    public function setOutsideAddress($outsideAddress = false)
    {
        $this->outsideAddress = $outsideAddress;
    }

    public function getStreet()
    {
        return $this->street;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function getDistrict()
    {
        return $this->district;
    }

    public function getZipCode()
    {
        return $this->zipCode;
    }

    public function getComplement()
    {
        return $this->complement;
    }

    public function getStateInitials()
    {
        return $this->stateInitials;
    }

    public function getCityName()
    {
        return $this->cityName;
    }

    public function getCountryName()
    {
        return $this->countryName;
    }

    public function getIdNation()
    {
        return $this->idNation;
    }

    public function getOutsideAddress()
    {
        return $this->outsideAddress;
    }

    public function translateFieldsAddress($data)
    {
        $newFildsAddress = new stdClass();
        $newFildsAddress->logradouro       = $data->street;
        $newFildsAddress->numero           = $data->number;
        $newFildsAddress->bairro           = $data->district;
        $newFildsAddress->complemento      = $data->complement;
        $newFildsAddress->enderecoExterior = $data->outsideAddress;   
        $newFildsAddress->cep              = $data->zipCode;   
        $newFildsAddress->idPais           = $data->idNation;   

        return $newFildsAddress;
    }    
}
