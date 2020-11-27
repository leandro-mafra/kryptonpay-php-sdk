<?php


namespace KryptonPay\Api;

use StdClass;

class InstallmentsTax
{
    private $installmentTaxArray;

    public function addInstallmentsTax($tax)
    {
        $this->installmentTaxArray[] = $tax;
    }

    public function addInstallmentsTaxFix($installments, $tax)
    {
        $counter = 0;
        while($counter < $installments)
        {
            $this->installmentTaxArray[] = $tax;
            $counter++;
        }
    }

    public function getInstallmentsTax()
    {
        return $this->installmentTaxArray;
    }
}