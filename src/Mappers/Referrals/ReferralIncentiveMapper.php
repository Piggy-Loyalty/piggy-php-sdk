<?php

namespace Piggy\Api\Mappers\Referrals;

use Piggy\Api\Enums\IncentiveTargetType;
use Piggy\Api\Enums\IncentiveType;
use Piggy\Api\Models\Referral\ReferralIncentive;
use stdClass;

class ReferralIncentiveMapper
{
    public static function map(stdClass $data): ReferralIncentive
    {
        return new ReferralIncentive(
            incentive_target_type: IncentiveTargetType::from($data->incentive_target_type),
            incentive_type: IncentiveType::from($data->incentive_type),
            data: $data->data
        );
    }
}
