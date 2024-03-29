<?php

namespace Piggy\Api\StaticMappers\ContactIdentifiers;

use Piggy\Api\StaticMappers\Contacts\ContactMapper;
use Piggy\Api\Models\Contacts\ContactIdentifier;
use stdClass;

class ContactIdentifierMapper
{
    /**
     * @param stdClass $data
     * @return ContactIdentifier
     */
    public static function map(stdClass $data): ContactIdentifier
    {
        $contact = null;

        if (isset($data->contact)) {
            $contact = ContactMapper::map($data->contact);
        }

        return new ContactIdentifier(
            $data->value,
            $data->active ?? null,
            $data->name ?? null,
            $contact ?? null
        );
    }
}