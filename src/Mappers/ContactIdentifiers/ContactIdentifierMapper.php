<?php

namespace Piggy\Api\Mappers\ContactIdentifiers;

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
        return new ContactIdentifier(
            $data->value,
            $data->active ?? null,
            $data->name ?? ''
        );
    }
}
