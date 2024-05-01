<?php

namespace Piggy\Api\Models\Prepaid;

class PrepaidBalance
{
    /**
     * @var int
     */
    protected $balanceInCents;

    const contactsResourceUri = '/api/v3/oauth/clients/contacts';

    public function __construct(int $balanceInCents)
    {
        $this->balanceInCents = $balanceInCents;
    }

    public function getBalanceInCents(): int
    {
        return $this->balanceInCents;
    }
}
