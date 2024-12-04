<?php

namespace Piggy\Api\Mappers\Referrals;

use Piggy\Api\Enums\ReferralStatus;
use Piggy\Api\Mappers\BaseModelMapper;
use Piggy\Api\Models\Referral\Referral;
use stdClass;

class ReferralMapper extends BaseModelMapper
{
    public function map(stdClass $data): Referral
    {
        return new Referral(
            $data->uuid ?? null,
            ReferralStatus::from($data->status),
            (new ContactMapper)->map($data->referring_contact),
            (new ContactMapper)->map($data->referred_contact)
        );
    }
}
