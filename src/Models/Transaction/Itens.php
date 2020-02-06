<?php namespace KryptonPay\Models\Transaction;

use KryptonPay\Models\DefaultModel;

class Itens extends DefaultModel
{
    /**
     *
     * @var int codigo
     */
    public $codigo;

    /**
     *
     * @var string descrição
     */
    public $descricao;

    /**
     *
     * @var double valor unitario
     */
    public $valorUnitario;

    /**
     *
     * @var int quantidade
     */
    public $quantidade;
}
