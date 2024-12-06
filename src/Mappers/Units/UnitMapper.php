<?php

namespace Piggy\Api\Mappers\Units;

use Piggy\Api\Mappers\BaseModelMapper;
use Piggy\Api\Models\Unit;
use stdClass;

/**
 * @extends BaseModelMapper<Unit>
 */
class UnitMapper extends BaseModelMapper
{
    public static function map(stdClass $data): Unit
    {
        return new Unit(
            name: $data->name,
            label: $data->label,
            prefix: $data->prefix,
            isDefault: $data->is_default
        );
    }
}
