<?php

namespace Piggy\Api\StaticMappers\Vouchers;

/**
 * Class PromotionsMapper
 * @package Piggy\Api\Mappers\Vouchers
 */
class PromotionsMapper
{
    /**
     * @param $data
     * @return array
     */
    public static function map($data): array
    {
        $promotions = [];

        foreach ($data as $item) {
            $promotions[] = PromotionMapper::map($item);
        }

        return $promotions;
    }
}
