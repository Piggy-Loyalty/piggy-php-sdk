<?php

namespace Piggy\Api\StaticMappers\Referrals;

use Piggy\Api\Models\Referrals\Referral;

/**
 * Class ReferralMapper
 * @package Piggy\Api\Mappers\Referrals
 */
class ReferralMapper
{
    /**
     * @param $data
     * @return Referral
     */
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
