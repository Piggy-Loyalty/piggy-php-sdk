<?php

namespace Piggy\Api\Mappers\Loyalty;

use Exception;
use Piggy\Api\Mappers\Contacts\ContactMapper;
use Piggy\Api\Models\Loyalty\CreditReception;

/**
 * Class CreditReceptionMapper
 * @package Piggy\Api\Mappers\Loyalty
 */
class CreditReceptionMapper
{
    /**
     * @param $data
     *
     * @return CreditReception
     * @throws Exception
     */
    public function map($data): CreditReception
    {
        $mapper = new ContactMapper();
        $contact = $mapper->map($data->contact);

        $creditReception = new CreditReception(
            $data->uuid,
            $data->credits,
            $data->created_at,
            $contact,
            null,
            $data->unit_value ?? null
        );

        return $creditReception;
    }
}
