<?php

namespace Piggy\Api\Mappers\Contacts;

use Piggy\Api\Models\Contacts\ContactAttributeValue;

class ContactAttributeValueMapper
{
    /**
     * @param object $data
     *
     * @return ContactAttributeValue
     */
    public function map(object $data): ContactAttributeValue
    {
        return new ContactAttributeValue(
            $data->name,
            $data->value
        );
    }
}
