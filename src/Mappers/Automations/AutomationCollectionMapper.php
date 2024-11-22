<?php

namespace Piggy\Api\Mappers\Automations;

use Piggy\Api\Mappers\BaseCollectionMapper;
use Piggy\Api\Mappers\BaseMapper;
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
        $mapper = new AutomationMapper();

        $automations = [];
        foreach ($data as $item) {
            $automations[] = $mapper->map($item);
        }

        return $automations;
    }
}
