<?php

namespace Piggy\Api\StaticMappers\Referrals;

/**
 * Class ReferralsMapper
 * @package Piggy\Api\Mappers\Referrals
 */
class ReferralsMapper
{
    /**
     * @param $data
     * @return array
     */
    public static function map($data): array
    {
        $referrals = [];
        foreach ($data as $item) {
            $referrals[] = ReferralMapper::map($item);
        }

        return $referrals;
    }
}
