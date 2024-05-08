<?php

namespace Piggy\Api\Models\Loyalty;

class CreditBalance
{
    /**
     * @var int
     */
    protected $balance;

    /**
     * @var string
     */
    const contactsResourceUri = '/api/v3/oauth/clients/contacts';

    public function __construct(int $balance)
    {
        $this->balance = $balance;
    }

    public function getBalance(): int
    {
        return $this->balance;
    }
}
