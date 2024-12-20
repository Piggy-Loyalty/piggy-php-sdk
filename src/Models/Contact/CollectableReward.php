<?php

namespace Piggy\Api\Models\Contact;

use DateTimeImmutable;
use Piggy\Api\Models\BaseModel;

readonly class CollectableReward extends BaseModel
{
    public function __construct(
        public ?string $uuid,
        public ?string $title,
        public ?Reward $reward,
        public ?DateTimeImmutable $expiresAt,
        public bool $hasBeenCollected,
        public DateTimeImmutable $createdAt,
    ) {
        //
    }

    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getReward(): ?Reward
    {
        return $this->reward;
    }

    public function getExpiresAt(): ?DateTimeImmutable
    {
        return $this->expiresAt;
    }

    public function getHasBeenCollected(): bool
    {
        return $this->hasBeenCollected;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }
}
