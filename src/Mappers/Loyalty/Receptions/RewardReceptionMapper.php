<?php

namespace Piggy\Api\Mappers\Loyalty\Receptions;

use Exception;
use Piggy\Api\Mappers\ContactIdentifiers\ContactIdentifierMapper;
use Piggy\Api\Mappers\Contacts\ContactMapper;
use Piggy\Api\Mappers\Loyalty\Rewards\RewardMapper;
use Piggy\Api\Mappers\Shops\ShopMapper;
use Piggy\Api\Models\Loyalty\Receptions\RewardReception;
use stdClass;

/**
 * Class CreditReceptionMapper
 * @package Piggy\Api\Mappers\Loyalty
 */
class RewardReceptionMapper
{
    /**
     * @param stdClass $data
     * @return RewardReception
     * @throws Exception
     */
    public function map(stdClass $data): RewardReception
    {

        $mapper = new ContactMapper();
        $contact = $mapper->map($data->contact);

        $shopMapper = new ShopMapper();
        $shop = $shopMapper->map($data->shop);

        $rewardMapper = new RewardMapper();
        $reward = $rewardMapper->map($data->reward);

        $contactIdentifierMapper = new ContactIdentifierMapper();
        if (isset($data->contact_identifier)) {
            $contactIdentifier = $contactIdentifierMapper->map($data->contact_identifier);
        } else {
            $contactIdentifier = null;
        }

        return new RewardReception(
            $data->type,
            $data->credits,
            $data->uuid,
            $contact,
            $shop,
            $contactIdentifier,
            $data->created_at,
            $reward,
            $data->hasBeenCollected
        );
    }
}
