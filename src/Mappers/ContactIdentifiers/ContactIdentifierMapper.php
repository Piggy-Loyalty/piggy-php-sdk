<?php

namespace Piggy\Api\Mappers\ContactIdentifiers;

use Piggy\Api\Mappers\Contacts\ContactMapper;
use Piggy\Api\Models\Contacts\ContactIdentifier;

class ContactIdentifierMapper
{
    /**
     * @param object $data
     *
     * @return ContactIdentifier
     */
    public function map(object $data): ContactIdentifier
    {

        $contact = null;
        if (property_exists($data,'contact')) {
            $contactMapper = new ContactMapper();

            $contact = $contactMapper->map($data->contact);
        }

        $contactIdentifier = new ContactIdentifier(
            $data->name,
            $data->value,
            $data->active,
            $contact
        );

        return $contactIdentifier;
    }
}
