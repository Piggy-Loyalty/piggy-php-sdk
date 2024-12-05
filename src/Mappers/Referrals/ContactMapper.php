<?php

namespace Piggy\Api\Mappers\Referrals;

use Piggy\Api\Mappers\BaseModelMapper;
use Piggy\Api\Models\Referral\Contact;
use stdClass;

class ContactMapper extends BaseModelMapper
{
    public function map(stdClass $data): Contact
    {
        return new Contact(
            uuid: $data->uuid,
            email: $data->email,
        );
    }
}
