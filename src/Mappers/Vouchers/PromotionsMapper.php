<?php

namespace Piggy\Api\Mappers\Vouchers;

/**
 * Class PromotionsMapper
 */
class PromotionsMapper
{
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
