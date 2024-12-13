<?php

namespace Piggy\Api\Mappers\PrepaidTransactions;

use Piggy\Api\Mappers\BaseModelMapper;
use Piggy\Api\Models\PrepaidTransaction\PrepaidBalance;
use stdClass;

/**
 * @extends BaseModelMapper<PrepaidBalance>
 */
class PrepaidBalanceMapper extends BaseModelMapper
{
    public static function map(stdClass $data): PrepaidBalance
    {
        return new PrepaidBalance(
            balanceInCents: $data->balance_in_cents,
            balance: $data->balance
        );
    }
}
