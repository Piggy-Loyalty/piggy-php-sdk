<?php

namespace Piggy\Api\Models\Referral;

use Piggy\Api\Enums\ReferralStatus;
use Piggy\Api\Models\BaseModel;

readonly class Referral extends BaseModel
{
    public function __construct(
        public ?string $uuid,
        public ReferralStatus $status,
        public Contact $referringContact,
        public Contact $referredContact
    ) {
        //
    }

    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    public function getStatus(): ReferralStatus
    {
        return $this->status;
    }

    public function getReferringContact(): Contact
    {
        return $this->referringContact;
    }

    public function getReferredContact(): Contact
    {
        return $this->referredContact;
    }
}
