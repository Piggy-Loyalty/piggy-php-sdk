<?php

namespace Piggy\Api\Mappers\Shops;

use Piggy\Api\Models\Shops\Webshop;

/**
 * Class WebshopMapper
 * @package Piggy\Api\Mappers
 */
class WebshopMapper
{
    /**
     * @param object $data
     * @return Webshop
     */
    public function map(object $data): Webshop
    {
        $webshop = new Webshop(
            $data->id,
            $data->name
        );

        return $webshop;
    }
}
