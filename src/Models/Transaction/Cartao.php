<?php namespace KryptonPay\Models\Transaction;

use KryptonPay\Models\DefaultModel;
use KryptonPay\Models\Transaction\Credito;
use KryptonPay\Models\Transaction\Debito;

class Cartao extends DefaultModel
{
    /**
     * Credito.
     *
     * @var string App\Models\Transaction\Credito
     */
    public $credito;

    /**
     * Debito.
     *
     * @var string App\Models\Transaction\Debito
     */
    public $debito;

    public function __construct()
    {
        $this->credito = new Credito();
        $this->debito = new Debito();
    }
}
