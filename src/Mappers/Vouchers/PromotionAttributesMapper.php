<?php

namespace Piggy\Api\Mappers\Vouchers;

class PromotionAttributesMapper
{
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
