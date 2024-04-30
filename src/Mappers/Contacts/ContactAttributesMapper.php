<?php

namespace Piggy\Api\Mappers\Contacts;

class ContactAttributesMapper
{
    public function map(array $data): array
    {
        $contactAttributeMapper = new ContactAttributeMapper;
        $contactAttributes = [];

        foreach ($data as $item) {
            $contactAttributes[] = $contactAttributeMapper->map($item);
        }

        return $contactAttributes;
    }
}
