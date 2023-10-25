<?php

namespace Piggy\Api\Mappers\Automations;

/**
 * Class AutomationsMapper
 * @package Piggy\Api\Mappers\Shops
 */
class AutomationsMapper
{
    /**
     * @param $data
     * @return array
     */
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
