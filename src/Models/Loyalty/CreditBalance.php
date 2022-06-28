<?php

namespace Piggy\Api\Models\Loyalty;

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
