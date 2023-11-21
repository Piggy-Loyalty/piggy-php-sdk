<?php

namespace Piggy\Api\StaticMappers\Giftcards;

use Piggy\Api\StaticMappers\BaseMapper;
use Piggy\Api\Models\Giftcards\GiftcardTransaction;
use Piggy\Api\StaticMappers\Shops\ShopMapper;
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
    public static function map(stdClass $data): GiftcardTransaction
    {
//        if (isset($data->settlements)) {
//            $giftcardTransactionSettlementMapper = new GiftcardTransactionSettlementMapper();
//            $settlements = array_map(function($settlement) use ($giftcardTransactionSettlementMapper) {
//                return $giftcardTransactionSettlementMapper->map($settlement);
//            }, $data->settlements);
//        }

        if (isset($data->settlements)) {
            $settlements = array_map(function ($settlement) {
                return GiftcardTransactionSettlementMapper::map($settlement);
            }, $data->settlements);
        }

        if (isset($data->shop)) {
            $shop = ShopMapper::map($data->shop);
        }


        return new GiftcardTransaction(
            $data->uuid,
            $data->amount_in_cents,
            self::parseDate($data->created_at),
            $data->type ?? null,
            $data->settled ?? null,
            $data->card_id ?? null,
            $shop ?? null,
            $settlements ?? [],
            $data->id ?? null
        );
    }
}