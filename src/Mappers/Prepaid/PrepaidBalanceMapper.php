<?php

namespace Piggy\Api\Mappers\Prepaid;

use Piggy\Api\Models\Prepaid\PrepaidBalance;
use stdClass;

class PrepaidBalanceMapper
{
    /**
     * @param stdClass $data
     * @return PrepaidBalance|null
     */
    public function map(stdClass $data): ?PrepaidBalance
    {
        return new PrepaidBalance($data->balance_in_cents);
    }
}
