<?php

namespace Piggy\Api\Mappers\Automations;

use Piggy\Api\Enums\AutomationEventType;
use Piggy\Api\Enums\AutomationStatus;
use Piggy\Api\Mappers\BaseModelMapper;
use Piggy\Api\Models\Automation;
use Piggy\Api\Services\DateParserService;
use stdClass;

/**
 * @extends BaseModelMapper<Automation>
 */
class AutomationMapper extends BaseModelMapper
{
    public static function map(stdClass $data): Automation
    {
        return new Automation(
            uuid: $data->uuid,
            name: $data->name,
            status: AutomationStatus::from($data->status),
            event: AutomationEventType::from($data->event),
            createdAt: DateParserService::parse($data->created_at),
            updatedAt: DateParserService::parse($data->updated_at)
        );
    }
}
