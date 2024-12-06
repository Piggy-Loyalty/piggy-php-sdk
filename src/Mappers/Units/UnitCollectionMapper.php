<?php

namespace Piggy\Api\Mappers\Units;

use Piggy\Api\Mappers\BaseCollectionMapper;
use Piggy\Api\Models\Unit;
use stdClass;

class UnitCollectionMapper extends BaseCollectionMapper
{
    /**
     * @param  stdClass[]  $data
     * @return Unit[]
     */
    public static function map(array $data): array
    {
        return self::mapDataToModels(
            data: $data,
            mapper: UnitMapper::class
        );
    }
}
