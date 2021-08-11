<?php
/**
 * Created by PhpStorm.
 * User: Guilherme Viana <guilhermecfviana@gmail.com>
 * Date: 11/08/2021
 * Time: 14:13
 */

namespace KryptonPay\Models\Transaction;

use KryptonPay\Models\DefaultModel;

class Responsavel extends DefaultModel
{
    /**
     * Tipo da pessoa
     * 1 = Física
     * 2 = Jurídica
     * @var int
     */
    public $tipo;

    /**
     * CNPJ
     * @var string
     */
    public $cnpj;

    /**
     * CPF
     * @var string
     */
    public $cpf;

    /**
     * Nome
     * @var string
     */
    public $nome;

    /**
     * Nome Fantasia
     * @var string
     */
    public $nomeFantasia;

    /**
     * E-mail
     * @var string
     */
    public $email;

    /**
     * Data de nascimento
     * @var string
     */
    public $dataNascimento;

}