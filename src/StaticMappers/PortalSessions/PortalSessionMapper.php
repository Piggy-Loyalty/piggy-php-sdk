<?php

namespace Piggy\Api\StaticMappers\PortalSessions;

use Piggy\Api\StaticMappers\BaseMapper;
use Piggy\Api\StaticMappers\Contacts\ContactMapper;
use Piggy\Api\StaticMappers\Shops\ShopMapper;
use Piggy\Api\Models\PortalSessions\PortalSession;

/**
 * Class PortalSessionMapper
 * @package Piggy\Api\Mappers\PortalSessions
 */
class PortalSessionMapper extends BaseMapper
{
    /**
     * @param $data
     * @return PortalSession
     */
    public static function map($data): PortalSession
    {
        $shop = ShopMapper::map($data->shop);

        if (isset($data->contact)) {
            $contact = ContactMapper::map($data->contact);
        }

        return new PortalSession(
            $data->url,
            $data->uuid,
            $shop,
            self::parseDate($data->created_at),
            $contact ?? null
        );
    }
}
