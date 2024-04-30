<?php

namespace Piggy\Api\Mappers\Loyalty\LoyaltyTransactionAttributes;

/**
 * Class LoyaltyTransactionAttributesMapper
 */
class LoyaltyTransactionAttributesMapper
{
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
