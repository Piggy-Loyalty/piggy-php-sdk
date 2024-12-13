<?php

namespace Piggy\Api\Models\BusinessProfile;

use Piggy\Api\Models\BaseModel;

readonly class BusinessProfileAddress extends BaseModel
{
    public function __construct(
        public ?string $houseNumber,
        public ?string $postalCode
    ) {
        //
    }

    public function getHouseNumber(): ?string
    {
        return $this->houseNumber;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }
}
