<?php

namespace Piggy\Api\Mappers\Shops;

use Piggy\Api\Mappers\Loyalty\LoyaltyProgramMapper;
use Piggy\Api\Models\Shops\Shop;
use stdClass;

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
        $loyaltyProgramMapper = new LoyaltyProgramMapper();
        if (isset($data->loyalty_program)) {
            $loyaltyProgram = $loyaltyProgramMapper->map($data->loyalty_program);
        } else {
            $loyaltyProgram = null;
        }

        if (isset($data->reference)) {
            $reference = $data->reference;
        }

        return new Shop(
            $data->uuid,
            $data->name,
            $reference ?? null,
            $loyaltyProgram
        );
    }
}
