<?php

namespace Piggy\Api\Mappers\Vouchers;

use Piggy\Api\Models\Vouchers\PromotionAttribute;

class PromotionAttributesMapper
{
    /**
     * @param $data
     * @return array
     */
    public function map($data): array
    {
        $promotionAttributeMapper = new PromotionAttributeMapper();

        $attributes = [];
        foreach ($data as $item) {
            $attributes[] = $promotionAttributeMapper->map($item);
        }

        return $attributes;
    }

}
