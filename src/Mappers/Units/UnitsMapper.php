<?php

namespace Piggy\Api\Mappers\Units;

/**
 * Class UnitsMapper
 */
class UnitsMapper
{
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
