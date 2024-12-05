<?php

namespace Piggy\Api\Mappers\Automations;

use Piggy\Api\Enums\AutomationEventType;
use Piggy\Api\Enums\AutomationStatus;
use Piggy\Api\Mappers\BaseModelMapper;
use Piggy\Api\Models\Automation;
use Piggy\Api\Services\DateParserService;
use stdClass;

class AutomationMapper extends BaseModelMapper
{
    public static function map(stdClass $data): Automation
    {
        return new Automation(
            $data->uuid,
            $data->name,
            AutomationStatus::from($data->status),
            AutomationEventType::from($data->event),
            DateParserService::parse($data->created_at),
            DateParserService::parse($data->updated_at)
        );
    }
}
