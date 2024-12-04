<?php

namespace Piggy\Api\Mappers\Automations;

use Piggy\Api\Mappers\BaseCollectionMapper;
use Piggy\Api\Models\Automation;
use stdClass;

class AutomationCollectionMapper extends BaseCollectionMapper
{
    /**
     * @param  stdClass[]  $data
     * @return Automation[]
     */
    public function map(array $data): array
    {
        $mapper = new AutomationMapper;

        $models = [];
        foreach ($data as $item) {
            $models[] = $mapper->map($item);
        }

        return $models;
    }
}
