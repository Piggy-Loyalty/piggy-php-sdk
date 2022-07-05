<?php

namespace Piggy\Api\Resources\Register\Loyalty\Receptions;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Loyalty\Receptions\CreditReceptionMapper;
use Piggy\Api\Models\Loyalty\Receptions\CreditReception;
use Piggy\Api\Resources\BaseResource;

/**
 * Class CreditReceptionsResource
 * @package Piggy\Api\Resources\Register\Loyalty\Receptions
 */
class CreditReceptionsResource extends BaseResource
{
    /**
     * @var string
     */
    protected $resourceUri = "/api/v3/register/credit-receptions";

    /**
     * @param string $contactUuid
     * @param float|null $unitValue
     * @param int|null $credits
     * @param string|null $contactIdentifierValue
     * @param string|null $unitName
     * @param string|null $posTransactionUuid
     *
     * @return CreditReception
     * @throws PiggyRequestException
     */
    public function create(
        string $contactUuid,
        ?float $unitValue = null,
        ?int $credits = null,
        ?string $contactIdentifierValue = null,
        ?string $unitName = null,
        ?string $posTransactionUuid = null
    ): CreditReception {
        $response = $this->client->post($this->resourceUri, [
            "contact_uuid" => $contactUuid,
            "unit_value" => $unitValue,
            "credits" => $credits,
            "contact_identifier_value" => $contactIdentifierValue,
            "unit_name" => $unitName,
            "pos_transaction_id" => $posTransactionUuid,
        ]);

        $mapper = new CreditReceptionMapper();

        return $mapper->map($response->getData());
    }
}
