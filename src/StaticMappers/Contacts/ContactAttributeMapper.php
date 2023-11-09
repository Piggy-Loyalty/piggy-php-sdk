<?php

namespace Piggy\Api\StaticMappers\Contacts;

use Piggy\Api\Models\Contacts\ContactAttribute;
use stdClass;

class ContactAttributeMapper
{
    /**
     * @param stdClass $data
     * @return ContactAttribute
     */
    public static function map(stdClass $data): ContactAttribute
    {
        $attribute = null;

        if (property_exists($data,'attribute')) {
            $attribute = AttributeMapper::map($data->attribute);
        }

        return new ContactAttribute(
            $data->value,
            $attribute ?? []
        );
    }
}