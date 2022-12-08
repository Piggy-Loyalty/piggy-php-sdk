<?php

namespace Piggy\Api\Mappers\ContactAttributes;

class ContactAttributesMapper
{
    /**
     * @param array $data
     * @return array
     */
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