<?php

namespace Piggy\Api\Models\Prepaid;

/**
 * Class PrepaidBalance
 * @package Piggy\Api\Models
 */
class PrepaidBalance
{
    /**
     * @var int
     */
    protected $balanceInCents;

    /**
     * @param int $balanceInCents
     */
    public function __construct(int $balanceInCents)
    {
        $this->balanceInCents = $balanceInCents;
    }

    /**
     * @return int
     */
    public function getBalanceInCents(): int
    {
        return $this->balanceInCents;
    }
}
