<?php

namespace Piggy\Api\Mappers\Referrals;

use Piggy\Api\Mappers\BaseCollectionMapper;
use Piggy\Api\Models\Referral\Referral;
use stdClass;

class ReferralCollectionMapper extends BaseCollectionMapper
{
    /**
     * @param  stdClass[]  $data
     * @return Referral[]
     */
    public static function map(array $data): array
    {
        return self::mapDataToModels(
            data: $data,
            mapper: ReferralMapper::class
        );
    }
}
