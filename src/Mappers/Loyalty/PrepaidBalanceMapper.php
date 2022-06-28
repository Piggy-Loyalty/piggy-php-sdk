<?php

namespace Piggy\Api\Mappers\Loyalty;

use Piggy\Api\Models\Contacts\PrepaidBalance;
use stdClass;

/**
 * Class CreditBalanceMapper
 * @package Piggy\Api\Mappers\Loyalty
 */
class PrepaidBalanceMapper
{
    /**
     * @param stdClass $data
     * @return PrepaidBalance
     */
    public function map(stdClass $data): PrepaidBalance
    {
        return new PrepaidBalance($data->balance_in_cents);
    }
}
