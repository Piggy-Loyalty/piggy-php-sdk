<?php

namespace Piggy\Api\Models\Booking;

class Contact
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
