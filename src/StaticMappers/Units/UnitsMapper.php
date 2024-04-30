<?php

namespace Piggy\Api\StaticMappers\Units;

/**
 * Class UnitsMapper
 */
class UnitsMapper
{
    public static function map($data): array
    {
        $units = [];
        foreach ($data as $item) {
            $units[] = UnitMapper::map($item);
        }

        return $units;
    }
}
