<?php

namespace Piggy\Api\StaticMappers\Referrals;

/**
 * Class ReferralsMapper
 */
class ReferralsMapper
{
    public static function map($data): array
    {
        $referrals = [];
        foreach ($data as $item) {
            $referrals[] = ReferralMapper::map($item);
        }

        return $referrals;
    }
}
