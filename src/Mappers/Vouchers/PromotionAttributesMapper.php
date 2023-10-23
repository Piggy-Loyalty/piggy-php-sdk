<?php

namespace Piggy\Api\Mappers\Vouchers;

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
