<?php

namespace Piggy\Api\Mappers\PortalSessions;

use Piggy\Api\Mappers\BaseMapper;
use Piggy\Api\Mappers\Contacts\ContactMapper;
use Piggy\Api\Mappers\Shops\ShopMapper;
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
