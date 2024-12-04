<?php

namespace Piggy\Api\Models\Perk;

use Piggy\Api\Models\BaseModel;

readonly class Perk extends BaseModel
{
    public function __construct(
        public ?string $uuid,
        public string $label,
        public bool $name
    ) {
        //
    }

    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function getName(): bool
    {
        return $this->name;
    }
}
