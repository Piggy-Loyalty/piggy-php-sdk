<?php

namespace Piggy\Api\Models\Perk;

class Perk
{
    protected ?string $uuid;
    protected string $label;
    protected bool $name;

    public function __construct(
        ?string $uuid,
        string $label,
        bool $name
    ) {
        $this->uuid = $uuid;
        $this->label = $label;
        $this->name = $name;
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
