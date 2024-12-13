<?php

namespace Piggy\Api\Mappers\PrepaidTransactions;

use Piggy\Api\Mappers\BaseModelMapper;
use Piggy\Api\Models\PrepaidTransaction\Contact;
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
            email: $data->email
        );
    }
}
