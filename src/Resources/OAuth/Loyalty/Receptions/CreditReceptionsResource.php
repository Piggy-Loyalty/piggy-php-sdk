<?php

namespace Piggy\Api\Resources\OAuth\Loyalty\Receptions;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Loyalty\Receptions\CreditReceptionMapper;
use Piggy\Api\Models\Loyalty\Receptions\CreditReception;
use Piggy\Api\Resources\BaseResource;

/**
 * Class CreditReceptionsResource
 * @package Piggy\Api\Resources\OAuth\Loyalty\Receptions
 * @deprecated
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
        string  $contactUuid,
        string  $shopUuid,
        ?float  $unitValue = null,
        ?int    $credits = null,
        ?string $contactIdentifierValue = null,
        ?string $unitName = null,
        ?string $posTransactionUuid = null,
        ?array  $attributes = []
    ): CreditReception
    {
        $data = [
                "contact_uuid" => $contactUuid,
                "shop_uuid" => $shopUuid,
                "credits" => $credits,
                "unit_value" => $unitValue,
                "contact_identifier_value" => $contactIdentifierValue,
                "pos_transaction_id" => $posTransactionUuid,
                "unit_name" => $unitName,

            ] + $attributes;

        $response = $this->client->post($this->resourceUri, $data);

        $mapper = new CreditReceptionMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param string $shopUuid
     * @param float $unitValue
     * @param string|null $contactUuid
     * @return int
     * @throws PiggyRequestException
     */
    public function calculate(string $shopUuid, float $unitValue, ?string $contactUuid = null): int
    {
        $data = [
            "shop_uuid" => $shopUuid,
            "unit_value" => $unitValue,
        ];

        if ($contactUuid != null) {
            $data['contact_uuid'] = $contactUuid;
        }

        $response = $this->client->get($this->resourceUri . "/calculate", $data);

        return (int)$response->getData()->credits;
    }
}
