<?php

namespace Piggy\Api\Models;

class Media
{
    protected ?string $id;
    protected string $type;
    protected ?string $value;

    public function __construct(
        ?string $id,
        string $type,
        ?string $value
    ) {
        $this->id = $id;
        $this->type = $type;
        $this->value = $value;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }
}
