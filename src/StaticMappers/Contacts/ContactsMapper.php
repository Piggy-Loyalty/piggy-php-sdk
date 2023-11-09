<?php

namespace Piggy\Api\StaticMappers\Contacts;

class ContactsMapper
{
    /**
     * @param $data
     * @return array
     */
    public static function map($data): array
    {
        $contacts = [];
        foreach ($data as $item) {
            $contacts[] = ContactMapper::map($item);
        }

        return $contacts;
    }
}
