<?php

namespace Piggy\Api\Models\Contacts;

use Piggy\Api\Models\BaseModel;

readonly class ContactIdentifier extends BaseModel
{
    public function __construct(
        public string $name,
        public string $value,
        public bool $active
    ) {
        //
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function isActive(): bool
    {
        return $this->active;
    }
}
