<?php

namespace Piggy\Api\Mappers\ContactsPortal;

use Piggy\Api\Models\ContactsPortal\ContactsPortal;

/**
 * Class ContactsPortalAuthUrlMapper
 * @package Piggy\Api\Mappers\ContactsPortal
 */
class ContactsPortalAuthUrlMapper
{
    /**
     * @param $data
     * @return ContactsPortal
     */
    public function map($data): ContactsPortal
    {
        return new ContactsPortal(
            $data->url
        );
    }
}
