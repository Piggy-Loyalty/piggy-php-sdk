<?php

namespace Piggy\Api\Mappers\Perks;

use Piggy\Api\Mappers\BaseCollectionMapper;
use Piggy\Api\Models\Perk\PerkOption;
use stdClass;

/**
 * @extends BaseCollectionMapper<PerkOption>
 */
class PerkOptionCollectionMapper extends BaseCollectionMapper
{
    /**
     * @param  stdClass[]  $data
     * @return PerkOption[]
     */
    public static function map(array $data): array
    {
        return self::mapDataToModels(
            data: $data,
            mapper: PerkOptionMapper::class
        );
    }
}
