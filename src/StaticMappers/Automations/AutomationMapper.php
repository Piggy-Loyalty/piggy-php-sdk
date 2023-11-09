<?php

namespace Piggy\Api\StaticMappers\Automations;

use Piggy\Api\StaticMappers\BaseMapper;
use Piggy\Api\Models\Automations\Automation;
use stdClass;

/**
 * Class AutomationMapper
 * @package Piggy\Api\Mappers\Automations
 */
class AutomationMapper extends BaseMapper
{
    /**
     * @param stdClass $data
     * @return Automation
     */
    public static function map(stdClass $data): Automation
    {
        return new Automation(
            $data->name,
            $data->status,
            $data->event,
            self::parseDate($data->created_at),
            self::parseDate($data->updated_at)
        );
    }
}
