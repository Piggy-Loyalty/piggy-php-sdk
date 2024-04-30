<?php

namespace Piggy\Api\Mappers\Shops;

use Piggy\Api\Models\Shops\Shop;

/**
 * Class ShopMapper
 */
class ShopMapper
{
    public function map($data): Shop
    {
        return new Shop(
            $data->uuid,
            $data->name,
            $data->id ?? null
        );
    }
}
