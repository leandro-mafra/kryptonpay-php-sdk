<?php

namespace KryptonPay\Models\Transaction;

use KryptonPay\Models\DefaultModel;

class OpenAccount extends DefaultModel
{
    public $pessoa;
    public $endereco;
    public $contrato;
    public $usuario;


    public function __construct()
    {
        $this->pessoa = new Pessoa();
        $this->endereco = new Endereco();
        $this->contrato = new Contrato();
        $this->usuario = new Usuario();
    }
}
