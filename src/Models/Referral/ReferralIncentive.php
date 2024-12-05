<?php

namespace Piggy\Api\Models\Referral;

use Piggy\Api\Enums\IncentiveTargetType;
use Piggy\Api\Enums\IncentiveType;

readonly class ReferralIncentive
{
    public function __construct(
        public IncentiveTargetType $incentive_target_type,
        public IncentiveType $incentive_type,
        public ?array $data,
    ) {
        //
    }
}
