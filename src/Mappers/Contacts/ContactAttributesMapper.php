<?php

namespace Piggy\Api\Mappers\Contacts;

use Piggy\Api\Models\ContactAttributes\ContactAttribute;
use Piggy\Api\Models\Contacts\Contact;

class ContactAttributesMapper
{
    /**
     * @param array $data
     * @return ContactAttribute
     */
    public function map(array $data): ContactAttribute
    {
        $contactAttributeMapper = new ContactAttributeMapper;
        $contactAttributes = [];

        foreach ($data as $item) {
            var_dump('item', $item);
            $contactAttributes[] = $contactAttributeMapper->map($item);
        }

        return $contactAttributes;
    }
}