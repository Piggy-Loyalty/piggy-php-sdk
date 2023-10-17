<?php

namespace Piggy\Api\Mappers\Giftcards;

use Piggy\Api\Mappers\BaseMapper;
use Piggy\Api\Models\Giftcards\GiftcardTransaction;
use stdClass;


class GiftcardTransactionMapperNew extends BaseMapper
{
    /**
     * @param stdClass $giftcardTransaction
     * @return GiftcardTransaction
     */
    public function map(stdClass $giftcardTransaction): GiftcardTransaction
    {
        return new GiftcardTransaction(
            $giftcardTransaction->uuid,
            $giftcardTransaction->amount_in_cents,
            $this->parseDate($giftcardTransaction->created_at)
        );
    }
}