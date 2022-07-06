<?php

namespace Piggy\Api\Mappers\Prepaid;

use Piggy\Api\Mappers\BaseMapper;
use Piggy\Api\Models\Prepaid\PrepaidTransaction;
use stdClass;

/**
 * Class ShopMapper
 * @package Piggy\Api\Mappers\Shops
 */
class PrepaidTransactionMapper extends BaseMapper
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
            $this->parseDate($data->created_at)
        );
    }
}
