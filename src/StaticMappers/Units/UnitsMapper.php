<?php

namespace Piggy\Api\StaticMappers\Units;

/**
 * Class UnitsMapper
 * @package Piggy\Api\Mappers\Units
 */
class UnitsMapper
{
    /**
     * @param $data
     * @return array
     */
    public static function map($data): array
    {
        $units = [];
        foreach ($data as $item) {
            $units[] = UnitMapper::map($item);
        }

        return $units;
    }
}
