<?php

namespace Piggy\Api\StaticMappers\Giftcards;

use Piggy\Api\StaticMappers\BaseMapper;
use Piggy\Api\Models\Giftcards\GiftcardTransaction;
use stdClass;

/**
 * Class GiftcardTransactionMapper
 * @package Piggy\Api\Mappers\Giftcards
 */
class GiftcardTransactionMapper extends BaseMapper
{
    /**
     * @param stdClass $data
     * @return GiftcardTransaction
     */
    public function map(stdClass $data): GiftcardTransaction
    {
        if (isset($data->settlements)) {
            $giftcardTransactionSettlementMapper = new GiftcardTransactionSettlementMapper();
            $settlements = array_map(function($settlement) use ($giftcardTransactionSettlementMapper) {
                return $giftcardTransactionSettlementMapper->map($settlement);
            }, $data->settlements);
        }

        return new GiftcardTransaction(
            $data->uuid,
            $data->amount_in_cents,
            $this->parseDate($data->created_at),
            $data->type ?? null,
            $data->settled ?? null,
            $data->card_id ?? null,
            $data->shop_id ?? null,
            $settlements ?? [],
            $data->id ?? null
        );
    }
}