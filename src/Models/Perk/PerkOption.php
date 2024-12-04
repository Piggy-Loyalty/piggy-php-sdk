<?php

namespace Piggy\Api\Models\Perk;

use Piggy\Api\Models\BaseModel;

readonly class PerkOption extends BaseModel
{
    public function __construct(
        public string $label,
        public string $value,
        public bool $default,
        public Perk $perk
    ) {
        //
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
