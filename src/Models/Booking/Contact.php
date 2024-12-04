<?php

namespace Piggy\Api\Models\Booking;

use Piggy\Api\Models\BaseModel;

readonly class Contact extends BaseModel
{
    protected string $uuid;

    protected string $email;

    public function __construct(string $uuid, string $email)
    {
        $this->uuid = $uuid;
        $this->email = $email;
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
