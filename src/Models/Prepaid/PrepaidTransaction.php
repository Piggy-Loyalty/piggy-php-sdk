<?php

namespace Piggy\Api\Models\Prepaid;

/**
 * Class CreditBalance
 * @package Piggy\Api\Models
 */
class PrepaidTransaction
{
    /**
     * @var int
     */
    protected $amountInCents;

    /**
     * @var PrepaidBalance
     */
    protected $prepaidBalance;

    /**
     * @param int $amountInCents
     * @param PrepaidBalance $prepaidBalance
     */
    public function __construct(int $amountInCents, PrepaidBalance $prepaidBalance)
    {
        $this->amountInCents = $amountInCents;
        $this->prepaidBalance = $prepaidBalance;
    }

    /**
     * @return int
     */
    public function getAmountInCents(): int
    {
        return $this->amountInCents;
    }

    /**
     * @return PrepaidBalance
     */
    public function getPrepaidBalance(): PrepaidBalance
    {
        return $this->prepaidBalance;
    }
}
