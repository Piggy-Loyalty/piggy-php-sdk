<?php

namespace Piggy\Api\Models\Contact;

use Piggy\Api\Models\BaseModel;

readonly class Contact extends BaseModel
{
    public function __construct(
        public ?string $uuid,
        public string $email,
        public int $creditBalance,
        public int $prepaidBalance,
    ) {
        //
    }

    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getCreditBalance(): int
    {
        return $this->creditBalance;
    }

    public function getPrepaidBalance(): int
    {
        return $this->prepaidBalance;
    }
}
