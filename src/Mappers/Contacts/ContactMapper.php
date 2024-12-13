<?php

namespace Piggy\Api\Mappers\Contacts;

use Piggy\Api\Mappers\BaseModelMapper;
use Piggy\Api\Models\Contact\Contact;
use stdClass;

/**
 * @extends BaseModelMapper<Contact>
 */
class ContactMapper extends BaseModelMapper
{
    public static function map(stdClass $data): Contact
    {
        return new Contact(
            uuid: $data->uuid,
            email: $data->email,
            creditBalance: $data->credit_balance,
            prepaidBalance: $data->prepaid_balance,
        );
    }
}
