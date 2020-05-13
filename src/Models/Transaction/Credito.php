<?php namespace KryptonPay\Models\Transaction;

use KryptonPay\Models\DefaultModel;
use KryptonPay\Models\Transaction\Endereco;

class Credito extends DefaultModel
{
    /**
     * valor da transação.
     *
     * @var float
     */
    public $valor;

    /**
     * numero de parcelas da transação
     *
     * @var int
     */
    public $numeroParcelas;

    /**
     * descrição da transação
     *
     * @var string
     */
    public $descricao;

    /**
     * numero do cartão
     *
     * @var string
     */
    public $numeroCartao;

    /**
     * nome completo do titular do cartão
     *
     * @var string
     */
    public $nomeTitular;

    /**
     * codigo de segurança do cartão
     *
     * @var int
     */
    public $codigoSeguranca;

    /**
     * mês de validade do cartão
     *
     * @var int
     */
    public $mesExpiracao;

    /**
     * ano de validade do cartão
     *
     * @var int
     */
    public $anoExpiracao;

    /**
     * endereço.
     *
     * @var string App\Models\Transaction\Debito
     */
    public $endereco;

    public function __construct()
    {
        $this->endereco = new Endereco();
    }
}
