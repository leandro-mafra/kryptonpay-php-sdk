<?php namespace KryptonPay\Models\Transaction;

use KryptonPay\Models\DefaultModel;

class TipoTransacao extends DefaultModel
{
    /**
     * TransactionType id.
     *
     * @var int
     */
    public $id;

    /**
     * TransactionType description.
     *
     * @var string
     */
    public $description;

    /**
     * TransactionType create At.
     *
     * @var string
     */
    public $createdAt;

    /**
     * TransactionType updated At.
     *
     * @var string
     */
    public $updatedAt;
}
