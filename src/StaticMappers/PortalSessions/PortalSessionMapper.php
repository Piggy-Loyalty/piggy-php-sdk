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
    public function map($data): PortalSession
    {
        $shopMapper = new ShopMapper();
        $shop = $shopMapper->map($data->shop);

        if (isset($data->contact)) {
            $contactMapper = new ContactMapper();
            $contact = $contactMapper->map($data->contact);
        }

        return new PortalSession(
            $data->url,
            $data->uuid,
            $shop,
            $this->parseDate($data->created_at),
            $contact ?? null
        );
    }
}
