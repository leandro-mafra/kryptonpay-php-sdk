<?php namespace KryptonPay\Models\Transaction;

use KryptonPay\Models\DefaultModel;

class Boleto extends DefaultModel
{
    /**
     *@var string Data Desconto
     */
    public $dataDesconto;

    /**
     *@var int Valor Desconto
     */
    public $valorDesconto;

    /**
     * @var string Data de Vencimento
     */
    public $dataVencimento;

    /**
     * @var bool Pagamento Parcial
     */
    public $pagamentoParcial;

    /**
     * @var bool Cancelar após o vencimento
     */
    public $cancelarAposVencimento;

    /**
     * @var float % de multa
     */
    public $porcentagemMulta;

    /**
     * @var float Data da Multa
     */
    public $dataMulta;

    /**
     * @var float % juros
     */
    public $porcentagemJuros;

    /**
     * @var float valor
     */
    public $valor;

    /**
     * @var string instrucoes
     */
    public $instrucoes;

    /**
     * @var array observacoes
     */
    public $observacoes;
}
