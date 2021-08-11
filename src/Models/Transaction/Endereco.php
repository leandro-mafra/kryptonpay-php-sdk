<?php namespace KryptonPay\Models\Transaction;

use KryptonPay\Models\DefaultModel;

class Endereco extends DefaultModel
{
    /**
     * @var string logradouro
     */
    public $logradouro;

    /**
    * @var int numero
    */
    public $numero;

    /**
    * @var string bairro
    */
    public $bairro;

    /**
     * @var int cep
     */
    public $cep;

    /**
     * @var string complemento
     */
    public $complemento;

    /**
    * @var string estado
    */
    public $uf;

    /**
     * @var string cidade
     */
    public $cidade;

    /**
     * @var int pais
     */
    public $pais;

    /**
     * ID do Pais
     * @var int
     */
    public $idPais;

    /**
     * Endereço Exterior
     * @var bool
     */
    public $enderecoExterior;
}
