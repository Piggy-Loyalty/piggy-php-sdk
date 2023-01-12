<?php

namespace Piggy\Api\Mappers\Loyalty\Tokens;

use Piggy\Api\Mappers\BaseMapper;
use Piggy\Api\Mappers\Contacts\ContactMapper;
use Piggy\Api\Mappers\Shops\ShopMapper;
use Piggy\Api\Mappers\Units\UnitMapper;
use Piggy\Api\Models\Loyalty\Tokens\LoyaltyToken;
use stdClass;

/**
 * Class LoyaltyTokensMapper
 * @package Piggy\Api\Mappers\Loyalty
 */
class LoyaltyTokenMapper extends BaseMapper
{
    /**
     * @param stdClass $data
     * @return LoyaltyToken
     */
    public function map(stdClass $data): LoyaltyToken
    {
        $contact = null;
        if (property_exists($data, 'contact') && $data->contact != null) {
            $contactMapper = new ContactMapper();
            $contact = $contactMapper->map($data->contact);
        }

        $shop = null;
        if (property_exists($data, 'shop') && $data->shop != null) {
            $shopMapper = new ShopMapper();
            $shop = $shopMapper->map($data->shop);
        }

        $unit = null;
        if (property_exists($data, 'unit') && $data->unit != null) {
            $unitMapper = new UnitMapper();
            $unit = $unitMapper->map($data->unit);
        }

        return new LoyaltyToken(
            $data->type,
            $data->credits,
            $contact,
            $shop,
            $data->uuid,
            $this->parseDate($data->created_at),
            $unit,
            $data->unit_value
        );
    }
}

