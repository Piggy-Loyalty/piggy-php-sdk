<?php

namespace Piggy\Api\Mappers\Shops;

use Piggy\Api\Models\Shops\PhysicalShop;

/**
 * Class PhysicalShopMapper
 * @package Piggy\Api\Mappers\Shops
 */
class PhysicalShopMapper
{
    /**
     * @param object $data
     * @return PhysicalShop
     */
    public function map(object $data): PhysicalShop
    {
        $physicalShop = new PhysicalShop(
            $data->id,
            $data->name
        );

        return $physicalShop;
    }
}
