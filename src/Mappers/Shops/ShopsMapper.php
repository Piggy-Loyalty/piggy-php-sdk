<?php

namespace Piggy\Api\Mappers\Shops;

/**
 * Class ShopsMapper
 * @package Piggy\Api\Mappers\Shops
 */
class ShopsMapper
{
    /**
     * @param array $shops
     * @return array
     */
    public function map(array $shops): array
    {
        $physicalShopMapper = new PhysicalShopMapper();
        $webShopMapper = new WebshopMapper();

        return array_map(function (object $shop) use ($physicalShopMapper, $webShopMapper) {
            if ($shop->type == "physical") {

                return $physicalShopMapper->map($shop);
            }
            if ($shop->type == "web") {

                return $webShopMapper->map($shop);
            }
        }, $shops);
    }
}
