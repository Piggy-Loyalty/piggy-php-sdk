<?php

namespace Piggy\Api\Mappers\Contacts;

use Piggy\Api\Models\Contacts\ContactAttributeValue;

class ContactAttributeValuesMapper
{
    /**
     * @param array $data
     *
     * @return array
     */
    public function map(array $data): array
    {
        $contactAttributeValueMapper = new ContactAttributeValueMapper();
        $contactAttributesValues = [];

        foreach ($data as $item) {
            $contactAttributesValues[] = $contactAttributeValueMapper->map($item);
        }

        return $contactAttributesValues;
    }
}

