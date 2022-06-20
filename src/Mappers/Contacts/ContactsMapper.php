<?php

namespace Piggy\Api\Mappers\Contacts;

class ContactsMapper
{
    /**
     * @param object $data
     *
     * @return array
     */
    public function map(array $data): array
    {
        $contactMapper = new ContactMapper;

        $contacts = [];
        foreach ($data as $item) {
            $contacts[] = $contactMapper->map($item);
        }

        return $contacts;
    }
}
