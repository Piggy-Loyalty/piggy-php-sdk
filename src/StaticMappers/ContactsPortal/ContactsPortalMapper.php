<?php

namespace Piggy\Api\StaticMappers\ContactsPortal;

use Piggy\Api\Models\ContactsPortal\ContactsPortal;

/**
 * Class ContactsPortalAuthUrlMapper
 */
class ContactsPortalMapper
{
    public static function map($data): ContactsPortal
    {
        return new ContactsPortal(
            $data->url
        );
    }
}
