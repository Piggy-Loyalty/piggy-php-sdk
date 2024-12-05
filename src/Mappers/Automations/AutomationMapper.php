<?php

namespace Piggy\Api\Mappers\Automations;

use Piggy\Api\Enums\AutomationEventType;
use Piggy\Api\Enums\AutomationStatus;
use Piggy\Api\Mappers\BaseModelMapper;
use Piggy\Api\Models\Automation;
use stdClass;

class AutomationMapper extends BaseModelMapper
{
    public function map(stdClass $data): Automation
    {
        return new Automation(
            uuid: $data->uuid,
            name: $data->name,
            status: AutomationStatus::from($data->status),
            event: AutomationEventType::from($data->event),
            createdAt: $this->parseDate($data->created_at),
            updatedAt: $this->parseDate($data->updated_at)
        );
    }
}
