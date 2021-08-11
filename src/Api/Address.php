<?php

namespace KryptonPay\Api;

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
    private $idCountry;
    private $foreignAddress;

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

    /**
     * @return mixed
     */
    public function getIdCountry()
    {
        return $this->idCountry;
    }

    /**
     * @param mixed $idCountry
     */
    public function setIdCountry($idCountry)
    {
        $this->idCountry = $idCountry;
    }

    /**
     * @return mixed
     */
    public function getForeignAddress()
    {
        return $this->foreignAddress;
    }

    /**
     * @param mixed $foreignAddress
     */
    public function setForeignAddress($foreignAddress)
    {
        $this->foreignAddress = $foreignAddress;
    }

}
