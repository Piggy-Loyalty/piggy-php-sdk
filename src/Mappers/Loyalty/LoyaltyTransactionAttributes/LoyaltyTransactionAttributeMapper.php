<?php

namespace Piggy\Api\Mappers\Loyalty\LoyaltyTransactionAttributes;

use Piggy\Api\Models\Loyalty\Transaction\LoyaltyTransactionAttribute;

/**
 * Class LoyaltyTransactionAttributeMapper
 * @package Piggy\Api\Mappers\LoyaltyTransactionAttributes
 */
class LoyaltyTransactionAttributeMapper
{
    /**
     * @param $data
     * @return LoyaltyTransactionAttribute
     */
    public function map($data): LoyaltyTransactionAttribute
    {
        return new LoyaltyTransactionAttribute(
            $data->name,
            $data->label,
            $data->type,
            $data->field_type,
            $data->placeholder,
            $data->options,
            $data->is_piggy_defined,
            $data->is_soft_read_only,
            $data->is_hard_read_only
        );
    }
}

