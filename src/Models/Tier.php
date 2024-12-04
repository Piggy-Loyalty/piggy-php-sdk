<?php

namespace Piggy\Api\Models;

use Piggy\Api\Models\Perk\PerkOption;

readonly class Tier extends BaseModel
{
    /**
     * @param  PerkOption[]  $perks
     */
    public function __construct(
        public ?string $uuid,
        public string $name,
        public ?string $description,
        public int $position,
        public ?Media $media,
        public array $perks
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getPosition(): int
    {
        return $this->position;
    }

    public function getMedia(): ?Media
    {
        return $this->media;
    }

    /**
     * @return PerkOption[]
     */
    public function getPerks(): array
    {
        return $this->perks;
    }
}
