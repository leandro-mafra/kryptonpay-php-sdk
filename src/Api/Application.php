<?php

namespace KryptonPay\Api;

use stdClass;

class Application extends DefaultModel
{
    private $id;
    private $nome;
    private $url;
    private $applicationKey;
    private $default;
    private $contract;

    public function setId( int $id)
    {
        $this->id = $id;
    }

    public function setNome( string $nome)
    {
        $this->nome = $nome;
    }

    public function setDefault( bool $default)
    {
        $this->default = $default;
    }

    public function setUrl(string $url)
    {
        $this->url = $url;
    }

    public function setApplicationKey(string $applicationKey)
    {
        $this->applicationKey = $applicationKey;
    }

    public function setContract(int $contract)
    {
        $this->contract = $contract;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getDefault()
    {
        return $this->default;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getApplicationKey()
    {
        return $this->applicationKey;
    }

    public function getContract()
    {
        return $this->contract;
    }
}
