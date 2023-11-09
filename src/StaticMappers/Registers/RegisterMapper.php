<?php

namespace Piggy\Api\StaticMappers\Registers;

use Piggy\Api\StaticMappers\Shops\ShopMapper;
use Piggy\Api\Models\Registers\Register;

/**
 * Class RegisterMapper
 * @package Piggy\Api\Mappers\Registers
 */
class RegisterMapper
{
    /**
     * @param $response
     * @return Register
     */
    public function map($response): Register
    {
        $register = new Register();
        $shopMapper = new ShopMapper();

        $register->setId($response->id);
        $register->setName($response->name ?? null);
        $register->setShop($shopMapper->map($response->shop));
        $register->setIdentifier($response->identifier);

        return $register;
    }
}
