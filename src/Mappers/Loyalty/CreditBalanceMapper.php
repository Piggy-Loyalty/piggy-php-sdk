<?php

namespace Piggy\Api\Mappers\Loyalty;

use Piggy\Api\Models\Loyalty\CreditBalance;
use stdClass;

/**
 * Class CreditBalanceMapper
 */
class CreditBalanceMapper
{
    public function map(stdClass $data): CreditBalance
    {
        return new CreditBalance($data->balance);
    }
}
