<?php

namespace Piggy\Api\Models\Prepaid;

/**
 * Class PrepaidBalance
 */
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
