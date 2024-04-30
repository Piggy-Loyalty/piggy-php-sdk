<?php

namespace Piggy\Api\Mappers\ContactsPortal;

use Piggy\Api\Models\ContactsPortal\ContactsPortalAuthUrl;

/**
 * Class ContactsPortalAuthUrlMapper
 */
class ContactsPortalAuthUrlMapper
{
    public function map($data): ContactsPortalAuthUrl
    {
        return new ContactsPortalAuthUrl(
            $data->url
        );
    }
}
