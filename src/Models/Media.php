<?php

namespace Piggy\Api\Models;

readonly class Media extends BaseModel
{
    public function __construct(
        public ?string $id,
        public string $type,
        public ?string $value
    ) {
        //
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
