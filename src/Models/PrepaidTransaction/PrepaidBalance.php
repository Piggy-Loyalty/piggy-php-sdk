<?php

namespace Piggy\Api\Models\PrepaidTransaction;

use Piggy\Api\Models\BaseModel;

readonly class PrepaidBalance extends BaseModel
{
    public function __construct(
        public int $balanceInCents,
        public float|int|string $balance,
    ) {
        //
    }

    public function getBalanceInCents(): int
    {
        return $this->balanceInCents;
    }

    public function getBalanceAsCurrency(): float|int|string
    {
        return $this->balance;
    }
}
