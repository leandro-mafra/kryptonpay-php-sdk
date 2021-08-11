<?php
/**
 * Created by PhpStorm.
 * User: Guilherme Viana <guilhermecfviana@gmail.com>
 * Date: 11/08/2021
 * Time: 13:58
 */

namespace KryptonPay\Api;

use KryptonPay\Models\Transaction\Responsavel;

class Person extends DefaultModel
{

    /**
     * @var int
     */
    private $type;

    /**
     * @var string
     */
    private $cnpj;

    /**
     * @var string
     */
    private $cpf;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $fantasyName;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $birthday;

    /**
     * @var string
     */
    private $responsible;

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @param int $type
     */
    public function setType(int $type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getCnpj(): string
    {
        return $this->cnpj;
    }

    /**
     * @param string $cnpj
     */
    public function setCnpj(string $cnpj)
    {
        $this->cnpj = $cnpj;
    }

    /**
     * @return string
     */
    public function getCpf(): string
    {
        return $this->cpf;
    }

    /**
     * @param string $cpf
     */
    public function setCpf(string $cpf)
    {
        $this->cpf = $cpf;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getFantasyName(): string
    {
        return $this->fantasyName;
    }

    /**
     * @param string $fantasyName
     */
    public function setFantasyName(string $fantasyName)
    {
        $this->fantasyName = $fantasyName;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getBirthday(): string
    {
        return $this->birthday;
    }

    /**
     * @param string $birthday
     */
    public function setBirthday(string $birthday)
    {
        $this->birthday = $birthday;
    }

    /**
     * @return string
     */
    public function getResponsible(): Responsible
    {
        return $this->responsible;
    }

    /**
     * @param Responsible $responsible
     */
    public function setResponsible(Responsible $responsible)
    {
        $this->responsible = $responsible;
    }

}