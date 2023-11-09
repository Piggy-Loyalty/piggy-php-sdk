<?php

namespace Piggy\Api\StaticMappers\Prepaid;

use Piggy\Api\Models\Prepaid\PrepaidBalance;
use stdClass;

class PrepaidBalanceMapper
{
    /**
     * @param stdClass $data
     * @return PrepaidBalance|null
     */
    public static function map(stdClass $data): ?PrepaidBalance
    {
        return new PrepaidBalance($data->balance_in_cents);
    }
}
