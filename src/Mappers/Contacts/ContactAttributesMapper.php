<?php

namespace Piggy\Api\Mappers\Contacts;

class ContactAttributesMapper
{
    /**
     * @param array $data
     * @return array
     */
    public function map(array $data): array
    {
        var_dump('data2', $data);
        $contactAttributeMapper = new ContactAttributeMapper;
        $contactAttributes = [];

        foreach ($data as $item) {
            $contactAttributes[] = $contactAttributeMapper->map($item);
        }

        return $contactAttributes;
    }
}