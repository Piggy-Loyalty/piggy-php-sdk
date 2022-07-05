<?php

namespace Piggy\Api\Mappers\Loyalty\Receptions;

use Piggy\Api\Mappers\ContactIdentifiers\ContactIdentifierMapper;
use Piggy\Api\Mappers\Contacts\ContactMapper;
use Piggy\Api\Mappers\Loyalty\Rewards\DigitalRewardCodeMapper;
use Piggy\Api\Mappers\Loyalty\Rewards\DigitalRewardMapper;
use Piggy\Api\Mappers\Shops\ShopMapper;
use Piggy\Api\Models\Loyalty\Receptions\DigitalRewardReception;
use stdClass;

/**
 * Class CreditReceptionMapper
 * @package Piggy\Api\Mappers\Loyalty
 */
class DigitalRewardReceptionMapper
{
    /**
     * @param stdClass $data
     * @return DigitalRewardReception
     */
    public function map(stdClass $data): DigitalRewardReception
    {
        $contactMapper = new ContactMapper();
        $shopMapper = new ShopMapper();
        $digitalRewardMapper = new DigitalRewardMapper();
        $contactIdentifierMapper = new ContactIdentifierMapper();
        $digitalRewardCodeMapper = new DigitalRewardCodeMapper();

        $contact = $contactMapper->map($data->contact);
        $shop = $shopMapper->map($data->shop);
        $digitalReward = $digitalRewardMapper->map($data->digital_reward);
        $digitalRewardCode = $digitalRewardCodeMapper->map($data->digital_reward_code);

        if (isset($data->contact_identifier)) {
            $contactIdentifier = $contactIdentifierMapper->map($data->contact_identifier);
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
            $data->created_at,
            $data->title,
            $digitalReward,
            $digitalRewardCode
        );
    }
}
