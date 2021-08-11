<?php
/**
 * Created by PhpStorm.
 * User: Guilherme Viana <guilhermecfviana@gmail.com>
 * Date: 11/08/2021
 * Time: 14:13
 */

namespace KryptonPay\Models\Transaction;

use KryptonPay\Models\DefaultModel;

class Contrato extends DefaultModel
{
    /**
     * Data de início
     * @var int
     */
    public $dataInicio;

    /**
     * Data de validade
     * @var string
     */
    public $dataValidade;

    /**
     * ID da tabela
     * @var string
     */
    public $idTabela;

    /**
     * ID do status
     * @var int
     */
    public $status;

    /**
     * Dados bancários
     * @var string App\Models\Transaction\DadosBancarios
     */
    public $dadosBancarios;

    public function __construct()
    {
        $this->dadosBancarios = new DadosBancarios();
    }

}