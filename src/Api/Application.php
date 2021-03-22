<?php

namespace KryptonPay\Api;

use stdClass;

class Application extends DefaultModel
{
    private $id;
    private $nome;
    private $url;
    private $applicationKey;
    private $applicationMain;
    private $contract;

    public function setId( int $id)
    {
        $this->id = $id;
    }

    public function setNome( string $nome)
    {
        $this->nome = $nome;
    }

    public function setApplicationMain( bool $applicationMain)
    {
        $this->applicationMain = $applicationMain;
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

    public function getApplicationMain()
    {
        return $this->applicationMain;
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
