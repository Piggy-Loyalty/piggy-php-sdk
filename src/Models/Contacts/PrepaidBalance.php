<?php

namespace Piggy\Api\Models\Contacts;

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
     * PrepaidBalance constructor.
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
