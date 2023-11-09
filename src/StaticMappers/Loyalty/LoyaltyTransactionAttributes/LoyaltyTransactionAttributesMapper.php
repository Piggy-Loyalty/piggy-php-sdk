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
    public function map($data): array
    {
        $mapper = new LoyaltyTransactionAttributeMapper();

        $LoyaltyTransactionAttributes = [];
        foreach ($data as $item) {
            $LoyaltyTransactionAttributes[] = $mapper->map($item);
        }

        return $LoyaltyTransactionAttributes;
    }
}
