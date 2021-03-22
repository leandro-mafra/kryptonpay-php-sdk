<?php

namespace KryptonPay\Api;

use stdClass;

class User extends DefaultModel
{
    private $id;
    private $email;
    private $password;
    private $nome;
    private $idGrupo;
    private $cpfCnpj;
    private $hash;
    private $idioma;
    private $status;

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function setCpfCnpj(string $cpfCnpj)
    {
        $this->cpfCnpj = $cpfCnpj;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    public function setIdGrupo(string $idGrupo)
    {
        $this->idGrupo = $idGrupo;
    }

    public function setHash(string $hash)
    {
        $this->hash = $hash;
    }

    public function setIdioma(string $idioma)
    {
        $this->idioma = $idioma;
    }

    public function setStatus(int $status)
    {
        $this->status = $status;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getCpfCnpj()
    {
        return $this->cpfCnpj;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getIdGrupo()
    {
        return $this->idGrupo;
    }

    public function getHash()
    {
        return $this->hash;
    }

    public function getIdioma()
    {
        return $this->idioma;
    }

    public function getStatus()
    {
        return $this->status;
    }
}

