<?php

namespace Piggy\Api\Mappers\Units;

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
