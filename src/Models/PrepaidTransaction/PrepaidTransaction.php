<?php

namespace Piggy\Api\Models\PrepaidTransaction;

use Piggy\Api\Models\BaseModel;
use Piggy\Api\Models\BusinessProfile\BusinessProfile;
use Piggy\Api\Models\Contact\ContactIdentifier;

readonly class PrepaidTransaction extends BaseModel
{
    public function __construct(
        public ?string $uuid,
        public int $amountInCents,
        public PrepaidBalance $prepaidBalance,
        public ?string $createdAt,
        public ?BusinessProfile $shop,
        public ?ContactIdentifier $contactIdentifier,
        public Contact $contact
    ) {
        //
    }

    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    public function getAmountInCents(): int
    {
        return $this->amountInCents;
    }

    public function getPrepaidBalance(): PrepaidBalance
    {
        return $this->prepaidBalance;
    }

    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    public function getShop(): ?BusinessProfile
    {
        return $this->shop;
    }

    public function getIdentifier(): ?ContactIdentifier
    {
        return $this->contactIdentifier;
    }

    public function getContact(): Contact
    {
        return $this->contact;
    }
}
