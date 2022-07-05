<?php

namespace Piggy\Api\Mappers\Units;

/**
 * Class ShopsMapper
 * @package Piggy\Api\Mappers\Shops
 */
class UnitsMapper
{
    /**
     * @param $data
     * @return array
     */
    public function map($data): array
    {
        $mapper = new UnitMapper();

        $units = [];
        foreach ($data as $item) {
            $units[] = $mapper->map($item);
        }

        return $units;
    }
}
