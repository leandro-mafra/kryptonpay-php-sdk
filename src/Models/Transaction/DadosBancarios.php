<?php
/**
 * Created by PhpStorm.
 * User: Guilherme Viana <guilhermecfviana@gmail.com>
 * Date: 11/08/2021
 * Time: 14:20
 */

namespace KryptonPay\Models\Transaction;

class DadosBancarios
{

    /**
     * Tipo da conta
     * 1212
     * @var string
     */
    public $tipoConta;

    /**
     * Código do banco
     * @var string
     */
    public $codigoBanco;

    /**
     * Agência
     * @var string
     */
    public $agencia;

    /**
     * Dígito da agência
     * @var string
     */
    public $agenciaDigito;

    /**
     * Número da conta
     * @var string
     */
    public $conta;

    /**
     * Dígito da conta
     * @var string
     */
    public $contaDigito;

}