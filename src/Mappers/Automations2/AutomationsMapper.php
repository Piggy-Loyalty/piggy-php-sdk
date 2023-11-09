<?php

namespace Piggy\Api\Mappers\Automations2;

use Piggy\Api\Http\Responses\Response;

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
    public static function map(Response $response): array
    {
        $automations = [];

        foreach ($response->getData() as $item) {
            $automations[] = AutomationMapper::map($item);
        }

        return $automations;
    }
}
