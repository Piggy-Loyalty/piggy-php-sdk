<?php

namespace Piggy\Api\Resources\Register;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Prepaid\PrepaidTransactionMapper;
use Piggy\Api\Models\Prepaid\PrepaidTransaction;
use Piggy\Api\Resources\BaseResource;

/**
 * Class PrepaidTransactionResource
 * @package Piggy\Api\Resources\Register
 */
class PrepaidTransactionResource extends BaseResource
{
    /**
     * @var string
     */
    protected $resourceUri = "/api/v3/register/prepaid-transactions";

    /**
     * @param string $contactUuid
     * @param int $amountInCents
     * @param string|null $contactIdentifierValue
     *
     * @return PrepaidTransaction
     * @throws PiggyRequestException
     */
    public function create(string $contactUuid, int $amountInCents, ?string $contactIdentifierValue = null): PrepaidTransaction
    {
        $response = $this->client->post("$this->resourceUri", [
            "contact_uuid" => $contactUuid,
            "amount_in_cents" => $amountInCents,
            "contact_identifier_value" => $contactIdentifierValue
        ]);

        $mapper = new PrepaidTransactionMapper();

        return $mapper->map($response->getData());
    }
}
