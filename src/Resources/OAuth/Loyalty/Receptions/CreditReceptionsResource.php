<?php

namespace Piggy\Api\Resources\OAuth\Loyalty\Receptions;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Loyalty\Receptions\CreditReceptionMapper;
use Piggy\Api\Models\Loyalty\Receptions\CreditReception;
use Piggy\Api\Resources\BaseResource;

/**
 * Class CreditReceptionsResource
 * @package Piggy\Api\Resources\OAuth\Loyalty\Receptions
 */
class CreditReceptionsResource extends BaseResource
{
    /**
     * @var string
     */
    protected $resourceUri = "/api/v3/oauth/clients/credit-receptions";

    /**
     * @param string $contactUuid
     * @param string $shopUuid
     * @param float|null $unitValue
     * @param int|null $credits
     * @param string|null $contactIdentifierValue
     * @param string|null $unitName
     * @param string|null $posTransactionUuid
     * @param array|null $attributes
     *
     * @return CreditReception
     * @throws PiggyRequestException
     */
    public function create(
        string $contactUuid,
        string $shopUuid,
        ?float $unitValue = null,
        ?int $credits = null,
        ?string $contactIdentifierValue = null,
        ?string $unitName = null,
        ?string $posTransactionUuid = null,
        ?array $attributes = []
    ): CreditReception
    {
        $data = [
            "shop_uuid" => $shopUuid,
            "contact_uuid" => $contactUuid,
            "unit_value" => $unitValue,
            "credits" => $credits,
            "contact_identifier_value" => $contactIdentifierValue,
            "unit_name" => $unitName,
            "pos_transaction_id" => $posTransactionUuid,
        ] + $attributes;

        $response = $this->client->post($this->resourceUri,$data);

        $mapper = new CreditReceptionMapper();

        return $mapper->map($response->getData());
    }
}
