<?php

namespace Piggy\Api\Mappers\Giftcards;

use Piggy\Api\Models\Giftcards\GiftcardTransactionSettlement;
use stdClass;

/**
 * Class ShopMapper
 * @package Piggy\Api\Mappers\Shops
 */
class GiftcardTransactionSettlementMapper
{
    /**
     * @param stdClass $data
     * @return GiftcardTransactionSettlement
     */
    public function map(stdClass $data): GiftcardTransactionSettlement
    {
        return new GiftcardTransactionSettlement(
            $data->id ?? null
        );
    }
}
