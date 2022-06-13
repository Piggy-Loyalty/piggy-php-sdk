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
        if ($data == null) {
            $attribute = null;
        } else {
            $attributeMapper = new AttributeMapper();
            $attribute = $attributeMapper->map($data->attribute);
        }

        return new ContactAttribute(
            $data->value,
            $attribute ?? []
        );
    }
}
