<?php

namespace Piggy\Api\Mappers\Shops;

use Piggy\Api\Models\Shops\Webshop;

/**
 * Class WebshopsMapper
 * @package Piggy\Api\Mappers\Shops
 */
class WebshopsMapper
{
    /**
     * Map an array of objects into an array of web shop objects.
     *
     * @param array $webshops
     * @return array
     */
    public function map(array $webshops): array
    {
        $mapper = new WebshopMapper();

        return array_map(function(object $webShop) use ($mapper) {
            return $mapper->map($webShop);
        }, $webshops);
    }
}
