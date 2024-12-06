<?php

namespace Piggy\Api\Mappers\Automations;

use Piggy\Api\Mappers\BaseCollectionMapper;
use Piggy\Api\Models\Automation;
use stdClass;

/**
 * @extends BaseCollectionMapper<Automation>
 */
class AutomationCollectionMapper extends BaseCollectionMapper
{
    /**
     * @param  stdClass[]  $data
     * @return Automation[]
     */
    public static function map(array $data): array
    {
        return self::mapDataToModels(
            data: $data,
            mapper: AutomationMapper::class
        );
    }
}
