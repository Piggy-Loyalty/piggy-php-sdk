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
        if (isset($data->contact)) {
            $contactMapper = new ContactMapper();
            $contact = $contactMapper->map($data->contact);
        }

        if (isset($data->shop)) {
            $shopMapper = new ShopMapper();
            $shop = $shopMapper->map($data->shop);
        }

        if (isset($data->unit)) {
            $unitMapper = new UnitMapper();
            $unit = $unitMapper->map($data->unit);
        }

        if (isset($data->contact_identifier)) {
            $contactIdentifierMapper = new ContactIdentifierMapper();
            $contactIdentifier = $contactIdentifierMapper->map($data->contact_identifier);
        }

        return new CreditReception(
            $data->type,
            $data->credits ?? null,
            $data->uuid,
            $contact ?? null,
            $shop ?? null,
            $contactIdentifier ?? null,
            $this->parseDate($data->created_at),
            $data->unit_value ?? null,
            $unit ?? null
        );
    }
}