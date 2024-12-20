<?php

namespace Piggy\Api\Mappers\Contacts\CollectableRewards;

use Piggy\Api\Mappers\BaseCollectionMapper;
use Piggy\Api\Models\Contact\CollectableReward;
use stdClass;

/**
 * @extends BaseCollectionMapper<CollectableReward>
 */
class CollectableRewardCollectionMapper extends BaseCollectionMapper
{
    /**
     * @param  stdClass[]  $data
     * @return CollectableReward[]
     */
    public static function map(array $data): array
    {
        return self::mapDataToModels(
            data: $data,
            mapper: CollectableRewardMapper::class
        );
    }
}
