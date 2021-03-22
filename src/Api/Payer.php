<?php

namespace KryptonPay\Api;

class Payer extends DefaultModel
{
    private $tipo;
    private $nome;
    private $phone;
    private $nomeFantasia;
    private $identity;
    private $dataNascimento;
    private $cpf;
    private $cnpj;
    private $email;
    private $address;

    public function setTipo(int $tipo)
    {
        $this->tipo = $tipo;
    }

    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }

    public function setPhone(string $phone)
    {
        $this->phone = $phone;
    }

    public function setNomeFantasia(string $nomeFantasia)
    {
        $this->nomeFantasia = $nomeFantasia;
    }

    public function setIdentity(string $identity)
    {
        $this->identity = $identity;
    }

    public function setDataNascimento(string $dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function setAddress(Address $address)
    {
        $this->address = $address;
    }

    public function setCpf(string $cpf)
    {
        $this->cpf = $cpf;
    }

    public function setCnpj(string $cnpj)
    {
        $this->cnpj = $cnpj;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getNomeFantasia()
    {
        return $this->nomeFantasia;
    }

    public function getIdentity()
    {
        return $this->identity;
    }

    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function getCnpj()
    {
        return $this->cnpj;
    }
}
