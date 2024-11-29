<?php

namespace Piggy\Api\Models;

class Unit
{
    protected ?string $name;

    protected ?string $label;

    protected string $prefix;

    protected ?bool $is_default;

    public function __construct(
        ?string $name,
        ?string $label,
        string $prefix,
        ?bool $is_default
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->prefix = $prefix;
        $this->is_default = $is_default;
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
        return $this->is_default;
    }
}
