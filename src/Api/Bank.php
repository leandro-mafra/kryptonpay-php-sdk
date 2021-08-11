<?php
/**
 * Created by PhpStorm.
 * User: Guilherme Viana <guilhermecfviana@gmail.com>
 * Date: 11/08/2021
 * Time: 14:20
 */

namespace KryptonPay\Api;

class Bank
{

    /**
     * @var string
     */
    private $typeAccount;

    /**
     * @var string
     */
    private $bankCode;

    /**
     * @var string
     */
    private $agency;

    /**
     * @var int
     */
    private $digitAgency;

    /**
     * @var string
     */
    private $accountNumber;

    /**
     * @var int
     */
    private $digitAccountNumber;

    /**
     * @return string
     */
    public function getTypeAccount(): string
    {
        return $this->typeAccount;
    }

    /**
     * @param string $typeAccount
     */
    public function setTypeAccount(string $typeAccount)
    {
        $this->typeAccount = $typeAccount;
    }

    /**
     * @return string
     */
    public function getBankCode(): string
    {
        return $this->bankCode;
    }

    /**
     * @param string $bankCode
     */
    public function setBankCode(string $bankCode)
    {
        $this->bankCode = $bankCode;
    }

    /**
     * @return string
     */
    public function getAgency(): string
    {
        return $this->agency;
    }

    /**
     * @param string $agency
     */
    public function setAgency(string $agency)
    {
        $this->agency = $agency;
    }

    /**
     * @return int
     */
    public function getDigitAgency(): int
    {
        return $this->digitAgency;
    }

    /**
     * @param int $digitAgency
     */
    public function setDigitAgency(int $digitAgency)
    {
        $this->digitAgency = $digitAgency;
    }

    /**
     * @return string
     */
    public function getAccountNumber(): string
    {
        return $this->accountNumber;
    }

    /**
     * @param string $accountNumber
     */
    public function setAccountNumber(string $accountNumber)
    {
        $this->accountNumber = $accountNumber;
    }

    /**
     * @return int
     */
    public function getDigitAccountNumber(): int
    {
        return $this->digitAccountNumber;
    }

    /**
     * @param int $digitAccountNumber
     */
    public function setDigitAccountNumber(int $digitAccountNumber)
    {
        $this->digitAccountNumber = $digitAccountNumber;
    }



}