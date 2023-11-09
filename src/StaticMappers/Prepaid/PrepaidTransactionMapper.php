<?php

namespace Piggy\Api\StaticMappers\Prepaid;

use Piggy\Api\StaticMappers\BaseMapper;
use Piggy\Api\Models\Prepaid\PrepaidTransaction;
use stdClass;

/**
 * Class PrepaidTransactionMapper
 * @package Piggy\Api\Mappers\Prepaid
 */
class PrepaidTransactionMapper extends BaseMapper
{
    /**
     * @param stdClass $data
     * @return PrepaidTransaction
     */
    public static function map(stdClass $data): PrepaidTransaction
    {
        $prepaidBalance = PrepaidBalanceMapper::map($data->prepaid_balance);

        return new PrepaidTransaction(
            $data->amount_in_cents,
            $prepaidBalance,
            $data->uuid,
            self::parseDate($data->created_at)
        );
    }
}
