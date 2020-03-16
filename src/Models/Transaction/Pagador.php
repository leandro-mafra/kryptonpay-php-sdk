<?php namespace KryptonPay\Models\Transaction;

use KryptonPay\Models\DefaultModel;
use KryptonPay\Models\Transaction\Endereco;

class Pagador extends DefaultModel
{
    /**
     *@var int pagador nome
     */
    public $nome;

    /**
     * @var string pagador email
     */
    public $email;

    /**
     * @var string pagador celular
     */
    public $celular;

    /**
     * @var string pagador cpf
     */
    public $cpf;

    /**
     * @var string pagador cnpj
     */
    public $cnpj;

    /**
     * @var string pagador Data Nascimento
     */
    public $dataNascimento;

    /**
     * @var string pagador tipo
     */
    public $tipo;

    /**
     * Person
     * @var string App\Models\Transaction\Endereco
     */
    public $endereco;

    public function __construct()
    {
        $this->endereco = new endereco();
    }
}
