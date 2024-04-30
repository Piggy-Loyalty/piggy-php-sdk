<?php

namespace Piggy\Api\Mappers\Contacts;

class ContactsMapper
{
    public function map($data): array
    {
        $contactMapper = new ContactMapper;

        $contacts = [];
        foreach ($data as $item) {
            $contacts[] = $contactMapper->map($item);
        }

        return $contacts;
    }
}
