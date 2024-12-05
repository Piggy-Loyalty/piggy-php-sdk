<?php

namespace Piggy\Api\Models;

readonly class Unit extends BaseModel
{
    public function __construct(
        public ?string $name,
        public ?string $label,
        public string $prefix,
        public ?bool $isDefault
    ) {
        //
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function getPrefix(): string
    {
        return $this->prefix;
    }

    public function getIsDefault(): ?bool
    {
        return $this->isDefault;
    }
}
