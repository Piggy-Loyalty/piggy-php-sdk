<?php

namespace Piggy\Api\Models;

use DateTime;
use Piggy\Api\Enums\AutomationEventType;
use Piggy\Api\Enums\AutomationStatus;

class Automation extends BaseModel
{
    protected ?string $uuid;

    protected string $name;

    protected AutomationStatus $status;

    protected AutomationEventType $event;

    protected DateTime $createdAt;

    protected DateTime $updatedAt;

    public function __construct(
        ?string $uuid,
        string $name,
        AutomationStatus $status,
        AutomationEventType $event,
        DateTime $createdAt,
        DateTime $updatedAt
    ) {
        $this->uuid = $uuid;
        $this->name = $name;
        $this->status = $status;
        $this->event = $event;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getStatus(): AutomationStatus
    {
        return $this->status;
    }

    public function getEvent(): AutomationEventType
    {
        return $this->event;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }
}
