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
            uuid: $data->uuid,
            status: ReferralStatus::from($data->status),
            referringContact: ContactMapper::map($data->referring_contact),
            referredContact: ContactMapper::map($data->referred_contact)
        );
    }
}
