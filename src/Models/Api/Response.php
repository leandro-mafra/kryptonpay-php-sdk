<?php namespace KryptonPay\Models\Api;

use KryptonPay\Models\DefaultModel;

class Response extends DefaultModel
{
    /**
    *@var int code HTTP
    */
    public $code;

    /**
    *@var int errorCode
    */
    public $errorCode;

    /**
    *@var array messages
    */
    public $messages;
}
