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
            $data->uuid,
            $data->name,
            AutomationStatus::from($data->status),
            AutomationEventType::from($data->event),
            $this->parseDate($data->created_at),
            $this->parseDate($data->updated_at)
        );
    }
}
