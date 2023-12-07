<?php

namespace Piggy\Api\Mappers\ContactsPortal;

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
    public function map($data): ContactsPortalAuthUrl
    {
        return new ContactsPortalAuthUrl(
            $data->url
        );
    }
}
