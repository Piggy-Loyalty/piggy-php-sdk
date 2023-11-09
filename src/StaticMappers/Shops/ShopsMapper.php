<?php

namespace Piggy\Api\StaticMappers\Shops;

/**
 * Class ShopsMapper
 * @package Piggy\Api\Mappers\Shops
 */
class ShopsMapper
{
    /**
     * @param $data
     * @return array
     */
    public static function map($data): array
    {
        $shops = [];
        foreach ($data as $item) {
            $shops[] = ShopMapper::map($item);
        }

        return $shops;
    }
}
