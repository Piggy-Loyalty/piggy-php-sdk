<?php

namespace Piggy\Api\StaticMappers\Vouchers;

class PromotionAttributesMapper
{
    /**
     * @param $data
     * @return array
     */
    public static function map($data): array
    {
        $attributes = [];

        foreach ($data as $item) {
            $attributes[] = PromotionAttributeMapper::map($item);
        }

        return $attributes;
    }

}
