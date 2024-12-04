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
    public function map(array $data): array
    {
        return $this->mapDataToModels(
            data: $data,
            mapper: ReferralMapper::class
        );
    }
}
