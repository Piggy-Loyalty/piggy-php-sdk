<?php

namespace Piggy\Api\Mappers\Units;

use Piggy\Api\Mappers\BaseModelMapper;
use Piggy\Api\Models\Unit;
use stdClass;

class UnitMapper extends BaseModelMapper
{
    public static function map(stdClass $data): Unit
    {
        return new Unit(
            $data->name,
            $data->label,
            $data->prefix,
            $data->is_default
        );
    }
}
