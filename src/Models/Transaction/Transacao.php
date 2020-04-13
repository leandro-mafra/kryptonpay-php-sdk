<?php

namespace KryptonPay\Models\Transaction;

use KryptonPay\Models\DefaultModel;

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
     *@var string tabela de referencia
     */
    public $tabelaReferencia;

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
        $this->itens = [];
        $this->split = new Split();
        $this->boleto = new Boleto();
        $this->cartao = new Cartao();
    }
}
