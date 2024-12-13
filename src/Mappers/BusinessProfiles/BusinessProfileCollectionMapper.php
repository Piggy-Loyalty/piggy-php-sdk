<?php

namespace Piggy\Api\Mappers\BusinessProfiles;

use Piggy\Api\Mappers\BaseCollectionMapper;
use Piggy\Api\Models\BusinessProfile\BusinessProfile;
use stdClass;

/**
 * @extends BaseCollectionMapper<BusinessProfile>
 */
class BusinessProfileCollectionMapper extends BaseCollectionMapper
{
    /**
     * @param  stdClass[]  $data
     * @return BusinessProfile[]
     */
    public static function map(array $data): array
    {
        return self::mapDataToModels(
            data: $data,
            mapper: BusinessProfileMapper::class
        );
    }
}
