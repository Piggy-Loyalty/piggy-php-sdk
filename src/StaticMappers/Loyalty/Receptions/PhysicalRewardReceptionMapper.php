<?php

namespace Piggy\Api\StaticMappers\Loyalty\Receptions;

use Piggy\Api\StaticMappers\BaseMapper;
use Piggy\Api\StaticMappers\ContactIdentifiers\ContactIdentifierMapper;
use Piggy\Api\StaticMappers\Contacts\ContactMapper;
use Piggy\Api\StaticMappers\Loyalty\Rewards\PhysicalRewardMapper;
use Piggy\Api\StaticMappers\Shops\ShopMapper;
use Piggy\Api\Models\Loyalty\Receptions\PhysicalRewardReception;
use stdClass;

/**
 * Class PhysicalRewardReceptionMapper
 * @package Piggy\Api\Mappers\Loyalty
 */
class PhysicalRewardReceptionMapper extends BaseMapper
{
    /**
     * @param stdClass $data
     * @return PhysicalRewardReception
     */
    public function map(stdClass $data): PhysicalRewardReception
    {
        $contactMapper = new ContactMapper();
        $physicalRewardMapper = new PhysicalRewardMapper();
        $shopMapper = new ShopMapper();
        $contactIdentifierMapper = new ContactIdentifierMapper();

        $contact = $contactMapper->map($data->contact);
        $shop = $shopMapper->map($data->shop);
        $physicalReward = $physicalRewardMapper->map($data->reward);

        if (isset($data->contact_identifier)) {
            $contactIdentifier = $contactIdentifierMapper->map($data->contact_identifier);
        } else {
            $contactIdentifier = null;
        }

        return new PhysicalRewardReception(
            $data->type,
            $data->credits,
            $data->uuid,
            $contact,
            $shop,
            $contactIdentifier,
            $this->parseDate($data->created_at),
            $data->title,
            $physicalReward,
            isset($data->expiration_date) ? $this->parseDate($data->expiration_date) : null,
            $data->has_been_collected
        );
    }
}
