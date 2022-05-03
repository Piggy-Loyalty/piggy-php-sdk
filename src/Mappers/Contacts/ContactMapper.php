<?php

namespace Piggy\Api\Mappers\Contacts;

use Piggy\Api\Models\Contacts\Contact;

class ContactMapper
{
    /**
     * @param object $data
     *
     * @return Contact
     */
    public function map(object $data): Contact
    {
        $contact = new Contact(
            $data->uuid,
            $data->email
        );

//        $currentValues = new CurrentValuesMapper($data->currentValues);

        return $contact;
    }
}
