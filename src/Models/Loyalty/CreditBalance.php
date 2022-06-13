<?php

namespace Piggy\Api\Models\Loyalty;

use Piggy\Api\Models\Contacts\Contact;

/**
 * Class CreditBalance
 * @package Piggy\Api\Models
 */
class CreditBalance
{
    /**
     * @var int
     */
    private $balance;

    /**
     * CreditBalance constructor.
     * @param int $balance
     */
    public function __construct(int $balance)
    {
        $this->balance = $balance;
    }

    /**
     * @return int
     */
    public function getBalance(): int
    {
        return $this->balance;
    }
}
