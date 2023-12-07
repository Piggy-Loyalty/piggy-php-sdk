<?php

namespace Piggy\Api\StaticMappers\ContactsPortal;

use Piggy\Api\Models\ContactsPortal\ContactsPortal;

/**
 * Class ContactsPortalAuthUrlMapper
 * @package Piggy\Api\Mappers\ContactsPortal
 */
class ContactsPortalMapper
{
    /**
     * @param $data
     * @return ContactsPortal
     */
    public static function map($data): ContactsPortal
    {
        return new ContactsPortal(
            $data->url
        );
    }
}
