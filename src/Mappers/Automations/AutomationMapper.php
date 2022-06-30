<?php

namespace Piggy\Api\Mappers\Automations;

use Piggy\Api\Models\Automations\Automation;
use stdClass;

/**
 * Class ShopMapper
 * @package Piggy\Api\Mappers\Shops
 */
class AutomationMapper
{
    /**
     * @param stdClass $data
     * @return Automation
     */
    public function map(stdClass $data): Automation
    {
        return new Automation(
            $data->name,
            $data->status,
            $data->event,
            $data->created_at,
            $data->updated_at
        );
    }
}
