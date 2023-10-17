<?php

namespace Piggy\Api\Mappers\Vouchers;

/**
 * Class PromotionsMapper
 * @package Piggy\Api\Mappers\Promotions
 */
class PromotionsMapper
{
    /**
     * @param $data
     * @return array
     */
    public function map($data): array
    {
        $mapper = new PromotionMapper();

        $promotions = [];

        foreach ($data as $item) {
            $promotions[] = $mapper->map($item);
        }

        return $promotions;
    }
}
