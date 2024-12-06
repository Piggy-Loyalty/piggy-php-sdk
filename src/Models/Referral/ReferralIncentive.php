<?php

namespace Piggy\Api\Models\Referral;

use Piggy\Api\Enums\IncentiveTargetType;
use Piggy\Api\Enums\IncentiveType;
use Piggy\Api\Models\BaseModel;

readonly class ReferralIncentive extends BaseModel
{
    /**
     * @param  ?array<mixed, mixed>  $data
     */
    public function __construct(
        public IncentiveTargetType $incentiveTargetType,
        public IncentiveType $incentiveType,
        public ?array $data,
    ) {
        //
    }
}
