<?php

namespace KryptonPay\Api;


class Calendar extends DefaultModel
{
    private $dueDate;

    public function setDueDate(string $dueDate)
    {
        $this->dueDate = $dueDate;
    }

    public function getDueDate()
    {
        return $this->dueDate;
    }
}
