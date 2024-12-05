<?php

namespace Piggy\Api\Mappers\Referrals;

use Piggy\Api\Mappers\BaseModelMapper;
use Piggy\Api\Models\Referral\Contact;
use stdClass;

class ContactMapper extends BaseModelMapper
{
    public static function map(stdClass $data): Contact
    {
        return new Contact(
            $data->uuid,
            $data->email,
        );
    }
}
