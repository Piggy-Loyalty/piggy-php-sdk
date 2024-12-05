<?php

namespace Piggy\Api\Mappers\Tier;

use Piggy\Api\Mappers\BaseCollectionMapper;
use Piggy\Api\Models\Tier;
use stdClass;

class TierCollectionMapper extends BaseCollectionMapper
{
    /**
     * @param  stdClass[]  $data
     * @return Tier[]
     */
    public static function map(array $data): array
    {
        return self::mapDataToModels(
            data: $data,
            mapper: TierMapper::class
        );
    }
}
