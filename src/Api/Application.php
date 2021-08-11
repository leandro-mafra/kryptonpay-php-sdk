<?php
/**
 * Created by PhpStorm.
 * User: Guilherme Viana <guilhermecfviana@gmail.com>
 * Date: 11/08/2021
 * Time: 13:58
 */

namespace KryptonPay\Api;

class Application extends DefaultModel
{
    private $name;
    private $url;
    private $default;
    private $applicationKey;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getDefault()
    {
        return $this->default;
    }

    /**
     * @param mixed $default
     */
    public function setDefault($default)
    {
        $this->default = $default;
    }

    /**
     * @return mixed
     */
    public function getApplicationKey()
    {
        return $this->applicationKey;
    }

    /**
     * @param mixed $applicationKey
     */
    public function setApplicationKey($applicationKey)
    {
        $this->applicationKey = $applicationKey;
    }

}