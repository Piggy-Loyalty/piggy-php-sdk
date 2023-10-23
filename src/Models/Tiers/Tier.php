<?php

namespace Piggy\Api\Models\Tiers;

/**
 * Class Tier
 * @package Piggy\Api\Models\Tiers
 */
class Tier
{
    protected $uuid;
    protected $name;
    protected $description;
    protected $media;
    protected $position;

    public function __construct(
        string  $name,
        int     $position,
        ?string $uuid = null,
        ?string $description = null,
        ?array  $media = null
    )
    {
        $this->uuid = $uuid;
        $this->name = $name;
        $this->description = $description;
        $this->media = $media;
        $this->position = $position;
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

    public function getMedia(): ?array
    {
        return $this->media;
    }

    public function getPosition(): int
    {
        return $this->position;
    }
}
