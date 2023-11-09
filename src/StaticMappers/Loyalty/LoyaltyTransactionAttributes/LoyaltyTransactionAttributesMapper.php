<?php

namespace Piggy\Api\StaticMappers\Loyalty\LoyaltyTransactionAttributes;

/**
 * Class LoyaltyTransactionAttributesMapper
 * @package Piggy\Api\Mappers\LoyaltyTransactionAttributes
 */
class LoyaltyTransactionAttributesMapper
{
    /**
     * @param $data
     * @return array
     */
    public static function map($data): array
    {
        $loyaltyTransactionAttributes = [];

        foreach ($data as $item) {
            $loyaltyTransactionAttributes[] = LoyaltyTransactionAttributeMapper::map($item);
        }

        return $loyaltyTransactionAttributes;
    }
}
