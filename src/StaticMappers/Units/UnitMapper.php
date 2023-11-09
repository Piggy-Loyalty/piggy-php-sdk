<?php

namespace Piggy\Api\StaticMappers\Units;

use Piggy\Api\Models\Loyalty\Unit;
use stdClass;

/**
 * Class UnitMapper
 * @package Piggy\Api\Mappers\Units
 */
class UnitMapper
{
    /**
     * @param stdClass $data
     * @return Unit
     */
    public function map(stdClass $data): Unit
    {
        return new Unit(
            $data->name,
            $data->label ?? null,
            $data->is_default ?? null,
            $data->prefix ?? null
        );
    }
}