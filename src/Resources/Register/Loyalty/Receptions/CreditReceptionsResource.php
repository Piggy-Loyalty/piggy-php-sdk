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
     * @param array|null $attributes
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
        ?string $posTransactionUuid = null,
        ?array $attributes = []
    ): CreditReception {

        $data = [
            "contact_uuid" => $contactUuid,
            "unit_value" => $unitValue,
            "credits" => $credits,
            "contact_identifier_value" => $contactIdentifierValue,
            "unit_name" => $unitName,
            "pos_transaction_id" => $posTransactionUuid,
        ] + $attributes;

        $response = $this->client->post($this->resourceUri, $data);

        $mapper = new CreditReceptionMapper();

        return $mapper->map($response->getData());
    }

    public function calculate(string $contactUuid, string $shopUuid, array $unitValue, string $accountUuid) : CreditReception
    {

        $inputValues = [

                "contact_uuid" => $contactUuid,
                "shop_uuid" => $shopUuid,
                "unit_value" => $unitValue,
                "account_uuid" => $accountUuid,

            ];

        $response = $this->client->get($this->resourceUri, $inputValues);

        $mapper = new CreditReceptionMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param string $creditReceptionUuid
     * @return CreditReception
     * @throws PiggyRequestException
     */
    public function reverse(string $creditReceptionUuid): CreditReception
    {
        $response = $this->client->get("$this->resourceUri/$creditReceptionUuid/reverse");

        $mapper = new CreditReceptionMapper();

        return $mapper->map($response->getData());
    }
}
