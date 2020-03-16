<?php namespace KryptonPay\Models\Transaction;

use KryptonPay\Models\DefaultModel;
use KryptonPay\Models\Transaction\Itens;
use KryptonPay\Models\Transaction\Pagador;
use KryptonPay\Models\Transaction\Split;
use KryptonPay\Models\Transaction\Boleto;
use KryptonPay\Models\Transaction\Cartao;

class Transacao extends DefaultModel
{
    /**
     *@var int tipo pagamento
     */
    public $tipoPagamento;

    /**
     *@var int referencia
     */
    public $referencia;

    /**
     * pagador.
     *
     * @var string App\Models\Transaction\pagador
     */
    public $pagador;

    /**
     * Itens.
     *
     * @var string App\Models\Transaction\ItemTransacao
     */
    public $itens;

    /**
     * Itens.
     *
     * @var string App\Models\Transaction\Boleto
     */
    public $boleto;

    /**
     * Itens.
     *
     * @var string App\Models\Transaction\Cartao
     */
    public $cartao;

    /**
     * @var array Split
     */
    public $split;

    public function __construct()
    {
        $this->pagador = new Pagador();
        $this->itens = new Itens();
        $this->split = new Split();
        $this->boleto = new Boleto();
        $this->cartao = new Cartao();
    }
}
