<?php

namespace Piggy\Api\StaticMappers\Giftcards;

use Piggy\Api\Models\Giftcards\GiftcardTransactionSettlement;
use stdClass;

/**
 * Class GiftcardTransactionSettlementMapper
 * @package Piggy\Api\Mappers\Giftards
 */
class GiftcardTransactionSettlementMapper
{
    /**
     * @param stdClass $data
     * @return GiftcardTransactionSettlement
     */
    public static function map(stdClass $data): GiftcardTransactionSettlement
    {
        return new GiftcardTransactionSettlement(
            $data->id ?? null
        );
    }
}
