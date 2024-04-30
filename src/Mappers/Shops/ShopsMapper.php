<?php

namespace Piggy\Api\Mappers\Shops;

use Piggy\Api\Models\Shops\Shop;
use stdClass;

/**
 * Class ShopsMapper
 */
class ShopsMapper
{
    /**
     * @param  stdClass[]  $data
     * @return Shop[]
     */
    public function map(array $data): array
    {
        $mapper = new ShopMapper();

        $shops = [];
        foreach ($data as $item) {
            $shops[] = $mapper->map($item);
        }

        return $shops;
    }
}
