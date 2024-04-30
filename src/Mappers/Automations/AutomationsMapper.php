<?php

namespace Piggy\Api\Mappers\Automations;

/**
 * Class AutomationsMapper
 */
class AutomationsMapper
{
    public function map($data): array
    {
        $mapper = new AutomationMapper();

        $automations = [];
        foreach ($data as $item) {
            $automations[] = $mapper->map($item);
        }

        return $automations;
    }
}
