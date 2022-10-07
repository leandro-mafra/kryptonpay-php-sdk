<?php namespace KryptonPay\Models\Transaction;

use KryptonPay\Models\DefaultModel;

class Pix extends DefaultModel
{
    /**
    * valor
    *
    * @var int
    */
    public $valor;

    /**
     * documento
     *
     * @var string
     */
    public $solicitacaoPagador;

    /**
     * documento
     *
     * @var string
     */
    public $calendario;

    public function __construct()
    {
        $this->calendario = new Calendar();
    }
}
