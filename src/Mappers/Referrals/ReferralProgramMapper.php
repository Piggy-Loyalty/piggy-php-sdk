<?php

namespace Piggy\Api\Mappers\Referrals;

use Piggy\Api\Enums\CompletionEvent;
use Piggy\Api\Mappers\BaseModelMapper;
use Piggy\Api\Models\Referral\ReferralProgram;
use stdClass;

/**
 * @extends BaseModelMapper<ReferralProgram>
 */
class ReferralProgramMapper extends BaseModelMapper
{
    public static function map(stdClass $data): ReferralProgram
    {
        return new ReferralProgram(
            completionEvent: CompletionEvent::from($data->completion_event),
            limitPerContact: $data->limit_per_contact,
            referredContactIncentive: $data->referred_contact_incentive
                ? ReferralIncentiveMapper::map($data->referred_contact_incentive)
                : null,
            referringContactIncentive: $data->referring_contact_incentive
                ? ReferralIncentiveMapper::map($data->referring_contact_incentive)
                : null
        );
    }
}
