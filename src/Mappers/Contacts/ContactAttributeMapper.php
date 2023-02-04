<?php

namespace Piggy\Api\Mappers\Contacts;

use Piggy\Api\Models\Contacts\ContactAttribute;
use stdClass;

class ContactAttributeMapper
{
    /**
     * @param stdClass $data
     * @return ContactAttribute
     */
    public function map(stdClass $data): ContactAttribute
    {
        $attribute = null;
        if (property_exists($data,'attribute')) {
            $attributeMapper = new AttributeMapper();

            $attribute = $attributeMapper->map($data->attribute);
        }

        var_dump('data3', $data);
        return new ContactAttribute(
            $data->value,
            $attribute ?? []
        );
    }
}