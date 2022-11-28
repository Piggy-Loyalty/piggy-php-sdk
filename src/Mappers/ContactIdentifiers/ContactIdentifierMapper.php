<?php

namespace Piggy\Api\Mappers\ContactIdentifiers;

use Piggy\Api\Mappers\Contacts\ContactMapper;
use Piggy\Api\Models\Contacts\ContactIdentifier;
use stdClass;

class ContactIdentifierMapper
{
    /**
     * @param stdClass $data
     * @return ContactIdentifier
     */
    public function map(stdClass $data): ContactIdentifier
    {
        $contact = null;
        if (property_exists($data, 'contact')) {
            $contactMapper = new ContactMapper();
            $contact = $contactMapper->map($data->contact);
        }



        return new ContactIdentifier(
            $data->value,
            $data->active ?? null,
            $data->name ?? '',
            $contact
        );
    }
}
