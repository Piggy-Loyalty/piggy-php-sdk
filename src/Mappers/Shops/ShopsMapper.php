<?php

namespace Piggy\Api\Mappers\Shops;

/**
 * Class ShopsMapper
 */
class ShopsMapper
{
    public function map($data): array
    {
        $mapper = new ShopMapper();

        $shops = [];
        foreach ($data as $item) {
            $shops[] = $mapper->map($item);
        }

        return $shops;
    }
}
