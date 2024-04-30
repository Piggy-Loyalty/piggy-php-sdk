<?php

namespace Piggy\Api\Mappers\Giftcards;

class GiftcardTransactionsMapper
{
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
