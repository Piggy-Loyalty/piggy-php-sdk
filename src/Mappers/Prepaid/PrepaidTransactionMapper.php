<?php

namespace Piggy\Api\Mappers\Prepaid;

use Piggy\Api\Models\Prepaid\PrepaidTransaction;
use stdClass;

/**
 * Class ShopMapper
 * @package Piggy\Api\Mappers\Shops
 */
class PrepaidTransactionMapper
{
    /**
     * @param stdClass $data
     * @return PrepaidTransaction
     */
    public function map(stdClass $data): PrepaidTransaction
    {
        $prepaidBalanceMapper = new PrepaidBalanceMapper();

        $prepaidBalance = $prepaidBalanceMapper->map($data->prepaid_balance);

        return new PrepaidTransaction(
            $data->amount_in_cents,
            $prepaidBalance,
            $data->uuid,
            $data->created_at
        );
    }
}
