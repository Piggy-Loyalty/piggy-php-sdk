<?php

namespace Piggy\Api\Mappers\Loyalty\Receptions;

use Piggy\Api\Mappers\ContactIdentifiers\ContactIdentifierMapper;
use Piggy\Api\Mappers\Contacts\ContactMapper;
use Piggy\Api\Mappers\Loyalty\UnitMapper;
use Piggy\Api\Mappers\Shops\ShopMapper;
use Piggy\Api\Models\Loyalty\Receptions\CreditReception;
use stdClass;

/**
 * Class CreditReceptionMapper
 * @package Piggy\Api\Mappers\Loyalty
 */
class CreditReceptionMapper
{
    /**
     * @param stdClass $data
     * @return CreditReception
     */
    public function map(stdClass $data): CreditReception
    {

        $mapper = new ContactMapper();
        $contact = $mapper->map($data->contact);

        $shopMapper = new ShopMapper();
        $shop = $shopMapper->map($data->shop);

        $unitMapper = new UnitMapper();
        $unit = $unitMapper->map($data->unit);

        $contactIdentifierMapper = new ContactIdentifierMapper();
        if (isset($data->contact_identifier)) {
            $contactIdentifier = $contactIdentifierMapper->map($data->contact_identifier);
        } else {
            $contactIdentifier = null;
        }

        return new CreditReception(
            $data->type,
            $data->credits,
            $data->uuid,
            $contact,
            $shop,
            $contactIdentifier,
            $data->created_at,
            $data->unit_value,
            $unit
        );
    }
}
