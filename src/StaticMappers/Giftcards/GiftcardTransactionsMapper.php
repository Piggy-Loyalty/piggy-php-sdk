<?php

namespace Piggy\Api\StaticMappers\Giftcards;

class GiftcardTransactionsMapper
{
    /**
     * @param array $data
     * @return array
     */
    public function map(array $data): array
    {
        $giftcardTransactionsMapper = new GiftcardTransactionMapper;

        $giftcardTransactions = [];

        foreach ($data as $item) {
            $giftcardTransactions[] = $giftcardTransactionsMapper->map($item);
        }

        return $giftcardTransactions;
    }
}