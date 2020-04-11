<?php

namespace KryptonPay\Api;

class Payer extends DefaultModel
{
    private $type;
    private $name;
    private $phone;
    private $fantasyName;
    private $identity;
    private $birthDate;
    private $email;
    private $address;

    public function setType(int $type)
    {
        $this->type = $type;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setPhone(string $name)
    {
        $this->name = $name;
    }

    public function setFantasyName(string $fantasyName)
    {
        $this->fantasyName = $fantasyName;
    }

    public function setIdentity(string $identity)
    {
        $this->identity = $identity;
    }

    public function setBirthDate(string $birthDate)
    {
        $this->birthDate = $birthDate;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function setAddress(Address $address)
    {
        $this->address = $address;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getFantasyName()
    {
        return $this->fantasyName;
    }

    public function getIdentity()
    {
        return $this->identity;
    }

    public function getBirthDate()
    {
        return $this->birthDate;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getAddress()
    {
        return $this->address;
    }
}
