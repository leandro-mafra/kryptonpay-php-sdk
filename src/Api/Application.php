<?php

namespace KryptonPay\Api;

use stdClass;

class Application extends DefaultModel
{
    private $id;
    private $name;
    private $applicationMain;
    private $url;
    private $applicationKey;

    public function setId( string $id)
    {
        $this->id = $id;
    }

    public function setName( string $name)
    {
        $this->name = $name;
    }

    public function setApplicationMain( string $applicationMain)
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

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
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

    public function translateFieldsApplication($data)
    {
        $newFildsApplication = new stdClass();
        $newFildsApplication->id              = $data->id;
        $newFildsApplication->nome            = $data->name;
        $newFildsApplication->applicationMain = $data->applicationMain;
        $newFildsApplication->url             = $data->url;
        $newFildsApplication->applicationKey  = $data->applicationKey;

        return $newFildsApplication;
    }    
}
