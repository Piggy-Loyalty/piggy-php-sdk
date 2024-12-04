<?php

namespace Piggy\Api\Models\Perk;

use Piggy\Api\Mappers\Perks\PerkMapper;
use stdClass;

class PerkOption
{
    protected string $label;
    protected string $value;
    protected bool $default;
    protected Perk $perk;

    public function __construct(
        string $label,
        string $value,
        bool $default,
        stdClass $perk
    ) {
        $this->label = $label;
        $this->value = $value;
        $this->default = $default;
        $this->perk = (new PerkMapper)->map($perk);
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function isDefault(): bool
    {
        return $this->default;
    }

    public function getPerk(): Perk
    {
        return $this->perk;
    }
}
