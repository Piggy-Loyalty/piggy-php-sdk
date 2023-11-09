<?php

namespace Piggy\Api\StaticMappers\Loyalty;

use Piggy\Api\Models\Loyalty\CreditBalance;
use stdClass;

/**
 * Class CreditBalanceMapper
 * @package Piggy\Api\Mappers\Loyalty
 */
class CreditBalanceMapper
{
    /**
     * @param stdClass $data
     * @return CreditBalance
     */
    public function map(stdClass $data): CreditBalance
    {
        return new CreditBalance($data->balance);
    }
}
