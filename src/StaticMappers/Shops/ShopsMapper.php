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
