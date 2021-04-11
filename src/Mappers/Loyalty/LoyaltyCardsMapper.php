<?php

namespace Piggy\Api\Mappers\Loyalty;

/**
 * Class LoyaltyCardsMapper
 * @package Piggy\Api\Mappers\Loyalty
 */
class LoyaltyCardsMapper
{
    /**
     * @param array $data
     * @return array
     */
    public function map(array $data): array
    {
        $cardMapper = new LoyaltyCardMapper();

        $loyaltyCards = [];
        foreach ($data as $item) {
            $loyaltyCards[] = $cardMapper->map($item);
        }

        return $loyaltyCards;
    }
}
