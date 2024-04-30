<?php

namespace Piggy\Api\StaticMappers\Shops;

use Piggy\Api\Models\Shops\Shop;

/**
 * Class ShopMapper
 */
class ShopMapper
{
    public static function map($data): Shop
    {
        return new Shop(
            $data->uuid,
            $data->name,
            $data->id ?? null
        );
    }
}
