<?php

namespace Piggy\Api\Mappers\Referrals;

use Piggy\Api\Enums\ReferralStatus;
use Piggy\Api\Mappers\BaseModelMapper;
use Piggy\Api\Models\Referral\Referral;
use stdClass;

class ReferralMapper extends BaseModelMapper
{
    public static function map(stdClass $data): Referral
    {
        return new Referral(
            $data->uuid,
            ReferralStatus::from($data->status),
            ContactMapper::map($data->referring_contact),
            ContactMapper::map($data->referred_contact)
        );
    }
}
