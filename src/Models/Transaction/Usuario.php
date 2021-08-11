<?php
/**
 * Created by PhpStorm.
 * User: Guilherme Viana <guilhermecfviana@gmail.com>
 * Date: 11/08/2021
 * Time: 14:13
 */

namespace KryptonPay\Models\Transaction;

use KryptonPay\Models\DefaultModel;

class Usuario extends DefaultModel
{
    /**
     * E-mail
     * @var string
     */
    public $email;

    /**
     * Senha
     * @var string
     */
    public $password;

    /**
     * Hash 
     * Utilizar hash('sha512', 'sua string')
     * @var string
     */
    public $hash;

    /**
     * Nome
     * @var string
     */
    public $nome;

    /**
     * idioma 
     * Exemplo: 
     * Portugues: 'pt-br'
     * @var string
     */
    public $idioma;

    /**
     * CPF ou CNPJ
     * @var string
     */
    public $cpfCnpj;

}