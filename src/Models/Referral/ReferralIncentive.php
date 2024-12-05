<?php

namespace Piggy\Api\Models\Referral;

use Piggy\Api\Enums\IncentiveTargetType;
use Piggy\Api\Enums\IncentiveType;

readonly class ReferralIncentive
{
    public function __construct(
        public IncentiveTargetType $incentiveTargetType,
        public IncentiveType $incentiveType,
        public ?array $data,
    ) {
        //
    }
}
