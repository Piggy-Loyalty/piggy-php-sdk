<?php

namespace Piggy\Api\Models\BusinessProfile;

use Piggy\Api\Enums\BusinessProfileType;
use Piggy\Api\Models\BaseModel;

readonly class BusinessProfile extends BaseModel
{
    public function __construct(
        public ?string $uuid,
        public BusinessProfileType $type,
        public ?string $name,
        public ?string $reference,
        public ?BusinessProfileAddress $address
    ) {
        //
    }

    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    public function getType(): BusinessProfileType
    {
        return $this->type;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function getAddress(): ?BusinessProfileAddress
    {
        return $this->address;
    }
}
