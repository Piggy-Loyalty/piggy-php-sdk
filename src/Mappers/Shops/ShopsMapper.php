<?php

namespace Piggy\Api\Mappers\Shops;

use Exception;

/**
 * Class ShopsMapper
 * @package Piggy\Api\Mappers\Shops
 */
class ShopsMapper
{
    /**
     * @param $data
     * @return array
     * @throws Exception
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
