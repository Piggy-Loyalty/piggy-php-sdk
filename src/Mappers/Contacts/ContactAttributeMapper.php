<?php

namespace Piggy\Api\Mappers\Contacts;

use Piggy\Api\Models\Contacts\ContactAttribute;

class ContactAttributeMapper
{
    /**
     * @param object $data
     *
     * @return ContactAttribute
     */
    public function map(object $data): ContactAttribute
    {
        return new ContactAttribute(
            $data->name,
            $data->value
        );
    }
}
