<?php

namespace Piggy\Api\Models\Referral;

use Piggy\Api\Enums\CompletionEvent;
use Piggy\Api\Models\BaseModel;

readonly class ReferralProgram extends BaseModel
{
    public function __construct(
        public CompletionEvent $completionEvent,
        public ?int $limitPerContact,
        public ?ReferralIncentive $referredContactIncentive,
        public ?ReferralIncentive $referringContactIncentive,
    ) {
        //
    }

    public function getCompletionEvent(): CompletionEvent
    {
        return $this->completionEvent;
    }

    public function getLimitPerContact(): ?int
    {
        return $this->limitPerContact;
    }

    public function getReferredContactIncentive(): ?ReferralIncentive
    {
        return $this->referredContactIncentive;
    }

    public function getReferringContactIncentive(): ?ReferralIncentive
    {
        return $this->referringContactIncentive;
    }
}
