<?php

namespace Piggy\Api\StaticMappers\Giftcards;

class GiftcardTransactionsMapper
{
    /**
     * @param array $data
     * @return array
     */
    public static function map(array $data): array
    {
        $giftcardTransactions = [];

        foreach ($data as $item) {
            $giftcardTransactions[] = GiftcardTransactionMapper::map($item);
        }

        return $giftcardTransactions;
    }
}