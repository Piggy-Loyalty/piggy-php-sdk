<?php

namespace Piggy\Api\Mappers\Loyalty\Receptions;

use Piggy\Api\Mappers\BaseMapper;
use Piggy\Api\Mappers\ContactIdentifiers\ContactIdentifierMapper;
use Piggy\Api\Mappers\Contacts\ContactMapper;
use Piggy\Api\Mappers\Shops\ShopMapper;
use Piggy\Api\Mappers\Units\UnitMapper;
use Piggy\Api\Models\Loyalty\Receptions\CreditReception;
use stdClass;

/**
 * Class CreditReceptionMapper
 * @package Piggy\Api\Mappers\Loyalty
 */
class CreditReceptionMapper extends BaseMapper
{
    /**
     * @param stdClass $data
     * @return CreditReception
     */
    public function map(stdClass $data): CreditReception
    {
        $contactMapper = new ContactMapper();
        $shopMapper = new ShopMapper();
        $unitMapper = new UnitMapper();
        $contactIdentifierMapper = new ContactIdentifierMapper();
        $contact = $contactMapper->map($data->contact);
        $shop = $shopMapper->map($data->shop);

        if (isset($data->unit)) {
            $unit = $unitMapper->map($data->unit);
        } else {
            $unit = null;
        }

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
            $this->parseDate($data->created_at),
            $data->unit_value,
            $unit
        );
    }
}
