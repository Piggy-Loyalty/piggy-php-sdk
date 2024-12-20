<?php

namespace Piggy\Api\Models\Contact;

use Piggy\Api\Models\BaseModel;

readonly class ContactIdentifier extends BaseModel
{
    public function __construct(
        public string $name,
        public string $value,
        public bool $active,
        public bool $default,
        public ?string $contactUuid,
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

    public function isDefault(): bool
    {
        return $this->default;
    }

    public function getContactUuid(): ?string
    {
        return $this->contactUuid;
    }
}
