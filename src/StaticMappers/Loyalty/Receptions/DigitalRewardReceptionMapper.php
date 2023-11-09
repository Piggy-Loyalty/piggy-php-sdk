<?php

namespace Piggy\Api\StaticMappers\Loyalty\Receptions;

use Piggy\Api\StaticMappers\BaseMapper;
use Piggy\Api\StaticMappers\ContactIdentifiers\ContactIdentifierMapper;
use Piggy\Api\StaticMappers\Contacts\ContactMapper;
use Piggy\Api\StaticMappers\Loyalty\Rewards\DigitalRewardCodeMapper;
use Piggy\Api\StaticMappers\Loyalty\Rewards\DigitalRewardMapper;
use Piggy\Api\StaticMappers\Shops\ShopMapper;
use Piggy\Api\Models\Loyalty\Receptions\DigitalRewardReception;
use stdClass;

/**
 * Class DigitalRewardReceptionMapper
 * @package Piggy\Api\Mappers\Loyalty
 */
class DigitalRewardReceptionMapper extends BaseMapper
{
    /**
     * @param stdClass $data
     * @return DigitalRewardReception
     */
    public static function map(stdClass $data): DigitalRewardReception
    {
        $contact = ContactMapper::map($data->contact);
        $shop = ShopMapper::map($data->shop);
        $digitalReward = DigitalRewardMapper::map($data->digital_reward);
        $digitalRewardCode = DigitalRewardCodeMapper::map($data->digital_reward_code);

        if (isset($data->contact_identifier)) {
            $contactIdentifier = ContactIdentifierMapper::map($data->contact_identifier);
        } else {
            $contactIdentifier = null;
        }

        return new DigitalRewardReception(
            $data->type,
            $data->credits,
            $data->uuid,
            $contact,
            $shop,
            $contactIdentifier,
            self::parseDate($data->created_at),
            $data->title,
            $digitalReward,
            $digitalRewardCode
        );
    }
}
