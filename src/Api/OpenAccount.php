<?php
/**
 * Created by PhpStorm.
 * User: Guilherme Viana <guilhermecfviana@gmail.com>
 * Date: 11/08/2021
 * Time: 13:58
 */

namespace KryptonPay\Api;

class OpenAccount extends DefaultModel
{
    private $person;
    private $address;
    private $contract;
    private $user;

    public function setPerson(Person $person)
    {
        $this->person = $person;
    }

    public function getPerson() : Person
    {
        return $this->person;
    }

    public function setAddress(Address $address)
    {
        $this->address = $address;
    }

    public function getAddress() : Address
    {
        return $this->address;
    }

    public function setContract(Contract $contract)
    {
        $this->contract = $contract;
    }

    public function getContract() : Contract
    {
        return $this->contract;
    }

    public function setUser(User $user)
    {
        $this->user = $user;
    }

    public function getUser() : User
    {
        return $this->user;
    }

}