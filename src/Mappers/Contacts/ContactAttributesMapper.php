<?php

namespace Piggy\Api\Mappers\Contacts;

use Piggy\Api\Models\ContactAttributes\ContactAttributeWithValue;

class ContactAttributesMapper
{
    /**
     * @param ContactAttributeWithValue $data
     * @return ContactAttributeWithValue
     */
    public function map(ContactAttributeWithValue $data): ContactAttributeWithValue
    {
//        $contactAttributeMapper = new ContactAttributeMapper;
//        $contactAttributes = [];
//
//        foreach ($data as $item) {
//            $contactAttributes[] = $contactAttributeMapper->map($item);
//        }
//
//        return $contactAttributes;
//    }

        $contactAttributeWithValue = null;
        if (property_exists($data, 'attribute')) {
            $contactAttributeWithValueMapper = new ContactAttributeWithValueMapper();

            $contactAttributeWithValue = $contactAttributeWithValueMapper->map($data->attribute);
        }


        return new ContactAttributeWithValue(
            $data->value,
            $data->attribute ?? []
        );
    }
}
