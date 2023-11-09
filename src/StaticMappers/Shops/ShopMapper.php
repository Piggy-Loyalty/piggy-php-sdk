<?php

namespace Piggy\Api\StaticMappers\Shops;

use Piggy\Api\Models\Shops\Shop;

/**
 * Class ShopMapper
 * @package Piggy\Api\Mappers\Shops
 */
class ShopMapper
{
    /**
     * @param $data
     * @return Shop
     */
    public function map($data): Shop
    {
        return new Shop(
            $data->uuid,
            $data->name,
            $data->id ?? null
        );
    }
}
