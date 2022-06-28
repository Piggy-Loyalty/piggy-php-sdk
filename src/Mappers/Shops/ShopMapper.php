<?php

namespace Piggy\Api\Mappers\Shops;

use Piggy\Api\Mappers\Loyalty\LoyaltyProgramMapper;
use Piggy\Api\Models\Shops\PhysicalShop;
use Piggy\Api\Models\Shops\Shop;
use Piggy\Api\Models\Shops\Webshop;
use stdClass;

/**
 * Class ShopMapper
 * @package Piggy\Api\Mappers\Shops
 */
class ShopMapper
{
    /**
     * @param stdClass $data
     * @return Shop
     */
    public function map(stdClass $data)
    {
        $loyaltyProgramMapper = new LoyaltyProgramMapper();

        $loyaltyProgram = null;

        if ($data->loyalty_program) {
            $loyaltyProgram = $loyaltyProgramMapper->map($data->loyalty_program);
        }

        return new Shop(
            $data->uuid ,
            $data->name,
            $data->reference,
            $loyaltyProgram
        );
    }
}
