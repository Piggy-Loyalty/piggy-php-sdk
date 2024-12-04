<?php

namespace Piggy\Api\Models;

use DateTimeImmutable;
use Piggy\Api\Enums\AutomationEventType;
use Piggy\Api\Enums\AutomationStatus;

readonly class Automation extends BaseModel
{
    public function __construct(
        public ?string $uuid,
        public string $name,
        public AutomationStatus $status,
        public AutomationEventType $event,
        public DateTimeImmutable $createdAt,
        public DateTimeImmutable $updatedAt
    ) {
        //
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

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): DateTimeImmutable
    {
        return $this->updatedAt;
    }
}
