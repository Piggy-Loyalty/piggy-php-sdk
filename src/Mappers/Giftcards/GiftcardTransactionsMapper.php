<?php

namespace Piggy\Api\Mappers\Giftcards;

class GiftcardTransactionsMapper
{
    /**
     * @param array $data
     * @return array
     */
    public function map(array $data): array
    {
        $giftcardTransactionsMapper = new GiftcardTransactionMapperNew;

        $giftcardTransactions = [];

        var_dump($data);

        foreach ($data as $item) {
            $giftcardTransactions[] = $giftcardTransactionsMapper->map($item);
        }

        return $giftcardTransactions;
    }
}