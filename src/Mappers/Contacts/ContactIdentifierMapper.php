<?php

namespace Piggy\Api\Mappers\Contacts;

use Piggy\Api\Mappers\BaseModelMapper;
use Piggy\Api\Models\Contact\ContactIdentifier;
use stdClass;

/**
 * @extends BaseModelMapper<ContactIdentifier>
 */
class ContactIdentifierMapper extends BaseModelMapper
{
    public static function map(stdClass $data): ContactIdentifier
    {
        return new ContactIdentifier(
            name: $data->name,
            value: $data->value,
            active: $data->active
        );
    }
}
