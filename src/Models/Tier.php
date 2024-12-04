<?php

namespace Piggy\Api\Models;

use Piggy\Api\Mappers\Perks\PerkOptionCollectionMapper;
use Piggy\Api\Mappers\Media\MediaMapper;
use Piggy\Api\Mappers\Perks\PerkOptionMapper;
use Piggy\Api\Models\Media;
use stdClass;

class Tier
{
    protected ?string $uuid;

    protected string $name;

    protected ?string $description;

    protected int $position;

    protected ?Media $media;

    protected array $perks;

    public function __construct(
        ?string $uuid,
        string $name,
        ?string $description,
        int $position,
        ?stdClass $media,
        array $perks
    ) {
        $this->uuid = $uuid;
        $this->name = $name;
        $this->description = $description;
        $this->position = $position;
        $this->media = $media ? (new MediaMapper)->map($media) : null;
        $this->perks = (new PerkOptionCollectionMapper)->map($perks);
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

    public function getMedia(): ?stdClass
    {
        return $this->media;
    }

    public function getPerks(): array
    {
        return $this->perks;
    }
}
