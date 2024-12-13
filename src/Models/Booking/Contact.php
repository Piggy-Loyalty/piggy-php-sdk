<?php

namespace Piggy\Api\Models\Booking;

use Piggy\Api\Models\BaseModel;

readonly class Contact extends BaseModel
{
    public function __construct(
        public string $uuid,
        public string $email
    ) {
        //
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}
