<?php

namespace Piggy\Api\Models\CustomAttributes;

class Option
{
    protected $value;

    protected $label;

    protected $description;

    protected $media;

    public function __construct(string $value, string $label, ?string $description, ?string $media)
    {
        $this->value = $value;
        $this->label = $label;
        $this->description = $description;
        $this->media = $media;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function getDescription(): int
    {
        return $this->description;
    }

    public function getMedia(): ?string
    {
        return $this->media;
    }
}
