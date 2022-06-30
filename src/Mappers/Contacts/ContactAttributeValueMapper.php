<?php

namespace Piggy\Api\Mappers\Contacts;

use Piggy\Api\Models\Contacts\ContactAttributeValue;
use stdClass;

class ContactAttributeValueMapper
{
    /**
     * @param stdClass $data
     * @return ContactAttributeValue
     */
    public function map(stdClass $data): ContactAttributeValue
    {
        return new ContactAttributeValue(
            $data->name,
            $data->value
        );
    }
}
