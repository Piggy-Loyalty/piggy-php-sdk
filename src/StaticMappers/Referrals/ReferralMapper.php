<?php

namespace Piggy\Api\StaticMappers\Referrals;

use Piggy\Api\Models\Referrals\Referral;

/**
 * Class ReferralMapper
 */
class ReferralMapper
{
    public static function map($data): Referral
    {
        return new Referral(
            $data->uuid,
            $data->referred_contact,
            $data->referring_contact,
            $data->status
        );
    }
}
