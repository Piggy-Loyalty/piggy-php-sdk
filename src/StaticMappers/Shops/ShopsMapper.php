<?php

namespace Piggy\Api\StaticMappers\Shops;

/**
 * Class ShopsMapper
 */
class ShopsMapper
{
    public static function map($data): array
    {
        $shops = [];
        foreach ($data as $item) {
            $shops[] = ShopMapper::map($item);
        }

        return $shops;
    }
}
