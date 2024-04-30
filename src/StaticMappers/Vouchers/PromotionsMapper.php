<?php

namespace Piggy\Api\StaticMappers\Vouchers;

/**
 * Class PromotionsMapper
 */
class PromotionsMapper
{
    public static function map($data): array
    {
        $promotions = [];

        foreach ($data as $item) {
            $promotions[] = PromotionMapper::map($item);
        }

        return $promotions;
    }
}
