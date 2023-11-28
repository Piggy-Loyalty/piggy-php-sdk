<?php

namespace Piggy\Api\StaticMappers\Loyalty\LoyaltyTransactionAttributes;

use Piggy\Api\Models\Loyalty\Transactions\LoyaltyTransactionAttribute;

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
    public static function map($data): LoyaltyTransactionAttribute
    {
        $options = [];

        if (property_exists($data, 'options') && $data->options != null) {
            foreach ($data->options as $item) {
                $options[] = get_object_vars($item);
            }
        }

        return new LoyaltyTransactionAttribute(
            $data->name,
            $data->label,
            $data->type,
            $data->field_type,
            $data->placeholder,
            $options,
            $data->is_piggy_defined,
            $data->is_soft_read_only,
            $data->is_hard_read_only
        );
    }
}

