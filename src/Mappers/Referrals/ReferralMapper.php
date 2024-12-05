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
            uuid: $data->uuid,
            status: ReferralStatus::from($data->status),
            referringContact: (new ContactMapper)->map($data->referring_contact),
            referredContact: (new ContactMapper)->map($data->referred_contact)
        );
    }
}
