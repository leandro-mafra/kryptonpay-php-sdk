<?php

namespace KryptonPay\Api;

class Contract extends DefaultModel
{
    private $id;
    private $dataInicio;
    private $dataValidade;
    private $idTabela;
    private $idPessoa;
    private $idResponsavel;
    private $observacao;
    private $status;

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function setDataInicio(string $dataInicio)
    {
        $this->dataInicio = $dataInicio;
    }

    public function setDataValidade(string $dataValidade)
    {
        $this->dataValidade = $dataValidade;
    }

    public function setIdTabela(int $idTabela)
    {
        $this->idTabela = $idTabela;
    }

    public function setIdPessoa(int $idPessoa)
    {
        $this->idPessoa = $idPessoa;
    }

    public function setIdResponsavel(int $idResponsavel)
    {
        $this->idResponsavel = $idResponsavel;
    }

    public function setObservacao(string $observacao)
    {
        $this->observacao = $observacao;
    }

    public function setStatus(Bool $status)
    {
        $this->status = $status;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getObservacao()
    {
        return $this->observacao;
    }

    public function getIdResponsavel()
    {
        return $this->idResponsavel;
    }

    public function getIdPessoa()
    {
        return $this->idPessoa;
    }

    public function getIdTabela()
    {
        return $this->idTabela;
    }

    public function getdataValidade()
    {
        return $this->dataValidade;
    }
    
    public function getDataInicio()
    {
        return $this->dataInicio;
    }

    public function getId()
    {
        return $this->id;
    }
}

