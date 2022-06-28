<?php

namespace Piggy\Api\Mappers\Giftcards;

use Piggy\Api\Mappers\BaseMapper;
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
        return new GiftcardTransaction(
            $data->uuid,
            $data->amount_in_cents,
            $this->parseDate($data->created_at)
        );
    }
}