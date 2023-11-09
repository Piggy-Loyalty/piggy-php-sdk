<?php

namespace Piggy\Api\StaticMappers\ContactsPortal;

use Piggy\Api\Models\ContactsPortal\ContactsPortalAuthUrl;

/**
 * Class ContactsPortalAuthUrlMapper
 * @package Piggy\Api\Mappers\ContactsPortal
 */
class ContactsPortalAuthUrlMapper
{
    /**
     * @param $data
     * @return ContactsPortalAuthUrl
     */
    public static function map($data): ContactsPortalAuthUrl
    {
        return new ContactsPortalAuthUrl(
            $data->url
        );
    }
}
