<?php

namespace Piggy\Api\Mappers\Loyalty;

use Piggy\Api\Models\Contacts\Contact;
use Piggy\Api\Models\Loyalty\CreditBalance;

/**
 * Class CreditBalanceMapper
 * @package Piggy\Api\Mappers\Loyalty
 */
class CreditBalanceMapper
{
    /**
     * @param Contact $contact
     * @param object $data
     * @return CreditBalance
     */
    public function map(object $data): CreditBalance
    {
        return new CreditBalance($data->balance);
    }
}
