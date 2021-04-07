<?php

namespace KryptonPay\Api;

use stdClass;

class Account extends DefaultModel
{
    private $typePerson;
    private $birth;
    private $name;
    private $email;
    private $cpf;
    private $cnpj;
    private $fantasyName;
    private $password;
    private $hash;

    public function setTypePerson(int $typePerson)
    {
        $this->typePerson = $typePerson;
    }

    public function setBirth(string $birth)
    {
        $this->birth = $birth;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function setCpf(string $cpf)
    {
        $this->cpf = $cpf;
    }

    public function setCnpj(string $cnpj)
    {
        $this->cnpj = $cnpj;
    }

    public function setFantasyName(string $fantasyName)
    {
        $this->fantasyName = $fantasyName;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    public function setHash(string $hash)
    {
        $this->password = $hash;
    }

    public function getTypePerson()
    {
        return $this->typePerson;
    }

    public function getBirth()
    {
        return $this->birth;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function getCnpj()
    {
        return $this->cnpj;
    }

    public function getFantasyName()
    {
        return $this->fantasyName;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getHash()
    {
        return $this->hash;
    }

    public function translateFieldsAccount($data)
    {
        $newFildsAccount = new stdClass();
        $newFildsAccount->tipo           = $data->typePerson;
        $newFildsAccount->dataNascimento = $data->birth;
        $newFildsAccount->nome           = $data->name;
        $newFildsAccount->email          = $data->email;
        $newFildsAccount->cpf            = ($data->typePerson == 2) ? null               : $data->cpf;
        $newFildsAccount->cnpj           = ($data->typePerson == 2) ? $data->cnpj        : null;
        $newFildsAccount->nomeFantasia   = ($data->typePerson == 2) ? $data->fantasyName : null;

        return $newFildsAccount;
    }

    public function translateFieldsResponsible($data)
    {
        $newFildsResponsible = new stdClass();
        $newFildsResponsible->tipo           = is_null($data->typePerson) ? null : 1;
        $newFildsResponsible->nome           = is_null($data->name)       ? null : $data->name;
        $newFildsResponsible->email          = is_null($data->email)      ? null : $data->email;
        $newFildsResponsible->cpf            = is_null($data->cpf)        ? null : $data->cpf;
        $newFildsResponsible->dataNascimento = is_null($data->birth)      ? null : $data->birth;

        return $newFildsResponsible;
    }

    public function translateFieldsContract($idTable = 1)
    {
        $newFieldsContract = new stdClass();
        $newFieldsContract->dataInicio   = date('Y-m-d');
        $newFieldsContract->dataValidade = date('Y-m-d', strtotime('+1 year'));
        $newFieldsContract->idTabela     = $idTable;
        $newFieldsContract->status       = 1;

        return $newFieldsContract;
    }

    public function translateFieldsUsuario($data)
    {
        $newFieldsUsuario = new stdClass();
        $newFieldsUsuario->email    = $data->email;
        $newFieldsUsuario->password = hash('sha512', $data->password);
        $newFieldsUsuario->hash     = $newFieldsUsuario->password;
        $newFieldsUsuario->nome     = $data->name;
        $newFieldsUsuario->idioma   = 'pt-br';
        $newFieldsUsuario->cpfCnpj  = isset($data->cpf) ? $data->cpf : $data->cnpj;

        return $newFieldsUsuario;
    }
}
