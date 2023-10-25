<?php

namespace Piggy\Api\Resources\OAuth\Loyalty\Tokens;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Loyalty\Receptions\CreditReceptionMapper;
use Piggy\Api\Models\Loyalty\Receptions\CreditReception;
use Piggy\Api\Resources\BaseResource;

/**
 * Class LoyaltyTokenResource
 * @package Piggy\Api\Resources\OAuth\Loyalty\Tokens
 */
class LoyaltyTokenResource extends BaseResource
{
    /**
     * @var string
     */
    protected $resourceUri = "/api/v3/oauth/clients/loyalty-tokens";

    /**
     * @param string $version
     * @param string $shopId
     * @param string $uniqueId
     * @param int|null $credits
     * @param string|null $unitName
     * @param float|null $unitValue
     * @return string
     * @throws PiggyRequestException
     */
    public function create(string $version, string $shopId, string $uniqueId, ?int $credits = null, ?string $unitName = null, ?float $unitValue = null): string
    {
        $inputValues = [
            "version" => $version,
            "shop_id" => $shopId,
            "unique_id" => $uniqueId,
            "credits" => $credits,
            "unit_name" => $unitName,
            "unit_value" => $unitValue
        ];

        $response = $this->client->post($this->resourceUri, $inputValues);

        return $response->getData();
    }

    /**
     * @param string $version
     * @param string $shopId
     * @param string $uniqueId
     * @param string $timeStamp
     * @param string $hash
     * @param string $contactUuid
     * @param int | null $credits
     * @param string | null $unitName
     * @param float | null $unitValue
     * @return CreditReception
     * @throws PiggyRequestException
     */
    public function claim(string $version, string $shopId, string $uniqueId, string $timeStamp, string $hash, string $contactUuid, ?int $credits = null, ?string $unitName = null, ?float $unitValue = null): CreditReception
    {
        $inputValues = [
            "version" => $version,
            "shop_id" => $shopId,
            "unique_id" => $uniqueId,
            "timestamp" => $timeStamp,
            "hash" => $hash,
            "contact_uuid" => $contactUuid,
            "credits" => $credits,
            "unit_name" => $unitName,
            "unit_value" => $unitValue
        ];

        $response = $this->client->post($this->resourceUri . "/claim", $inputValues);

        $mapper = new CreditReceptionMapper();

        return $mapper->map($response->getData());
    }
}

