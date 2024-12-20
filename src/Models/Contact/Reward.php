<?php

namespace Piggy\Api\Models\Contact;

use Piggy\Api\Enums\RewardType;
use Piggy\Api\Models\BaseModel;
use Piggy\Api\Models\Media;

readonly class Reward extends BaseModel
{
    public function __construct(
        public ?string $uuid,
        public ?string $title,
        public ?RewardType $type,
        public bool $active,
        public ?string $description,
        public ?int $requiredCredits,
        public ?Media $media,
        public ?float $costPrice,
        public ?int $stock,
        public bool $preRedeemable,
        public ?int $expirationDuration,
        public array $customAttributes,
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

    public function getType(): ?RewardType
    {
        return $this->type;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getRequiredCredits(): ?int
    {
        return $this->requiredCredits;
    }

    public function getMedia(): ?Media
    {
        return $this->media;
    }

    public function getCostPrice(): ?float
    {
        return $this->costPrice;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function isPreRedeemable(): bool
    {
        return $this->preRedeemable;
    }

    public function getExpirationDuration(): ?int
    {
        return $this->expirationDuration;
    }

    /**
     * @return array<string, mixed>
     */
    public function getCustomAttributes(): array
    {
        return $this->customAttributes;
    }
}
