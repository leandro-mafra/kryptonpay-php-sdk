<?php
/**
 * Created by PhpStorm.
 * User: Guilherme Viana <guilhermecfviana@gmail.com>
 * Date: 11/08/2021
 * Time: 13:58
 */

namespace KryptonPay\Api;

class Contract extends DefaultModel
{

    /**
     * @var string
     */
    private $startDate;

    /**
     * @var string
     */
    private $dueDate;

    /**
     * @var int
     */
    private $idTable;

    /**
     * @var string
     */
    private $bank;

    /**
     * @return string
     */
    public function getStartDate(): string
    {
        return $this->startDate;
    }

    /**
     * @param string $startDate
     */
    public function setStartDate(string $startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * @return string
     */
    public function getDueDate(): string
    {
        return $this->dueDate;
    }

    /**
     * @param string $dueDate
     */
    public function setDueDate(string $dueDate)
    {
        $this->dueDate = $dueDate;
    }

    /**
     * @return int
     */
    public function getIdTable(): int
    {
        return $this->idTable;
    }

    /**
     * @param int $idTable
     */
    public function setIdTable(int $idTable)
    {
        $this->idTable = $idTable;
    }

    /**
     * @return string
     */
    public function getBank(): Bank
    {
        return $this->bank;
    }

    /**
     * @param string $bank
     */
    public function setBank(Bank $bank)
    {
        $this->bank = $bank;
    }

}