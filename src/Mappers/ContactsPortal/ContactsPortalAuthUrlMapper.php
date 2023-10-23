<?php

namespace Piggy\Api\Mappers\ContactsPortal;

use Piggy\Api\Models\ContactsPortal\ContactsPortalAuthUrl;

/**
 * Class ShopMapper
 * @package Piggy\Api\Mappers\Shops
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
