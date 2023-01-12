<?php

namespace Piggy\Api\Resources\OAuth\Loyalty\Tokens;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Loyalty\Receptions\CreditReceptionMapper;
use Piggy\Api\Mappers\Loyalty\Tokens\LoyaltyTokenMapper;
use Piggy\Api\Mappers\Loyalty\Tokens\LoyaltyTokensMapper;
use Piggy\Api\Models\Loyalty\Receptions\CreditReception;
use Piggy\Api\Models\Loyalty\Tokens\LoyaltyToken;
use Piggy\Api\Resources\BaseResource;

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
     * @param int | null $credits
     * @param string | null $unitName
     * @param float | null $unitValue
     * @return string
     * @throws PiggyRequestException
     */
    public function create(string $version, string $shopId, string $uniqueId, ?int $credits = null, ?string $unitName = null, ?float $unitValue = null): string
    {
        // todo add version key
        $inputValues = [
            "version" => $version,
            "shop_id" => $shopId,
            "unique_id" => $uniqueId,
            "credits" => $credits,
            "unit_name" => $unitName,
            "unit_value" => $unitValue
        ];

        $response = $this->client->post($this->resourceUri, $inputValues);

        return $response->getData()->data;
    }

    /**
     * @param string $version
     * @param string $shopId
     * @param string $uniqueId
     * @param string $timeStamp
     * @param string $hash
     * @param string $contactUuid
     * @return LoyaltyToken
     * @throws PiggyRequestException
     */
    public function claim(string $version, string $shopId, string $uniqueId, string $timeStamp, string $hash, string $contactUuid, int $credits): LoyaltyToken
    {
        $inputValues = [
            "version" => "required",
            "shop_id" => "required",
            "unique_id" => "required",
            "timestamp" => "required",
            "hash" => "required",
            "contact_uuid" => "required",
            "credits" => "required"
        ];

        $response = $this->client->post($this->resourceUri . "/claim", $inputValues);

        $mapper = new LoyaltyTokenMapper();

        return $mapper->map($response->getData());
    }
}

//$response = $this->client->get($this->resourceUri."/calculate", $data);
//
//return (int)$response->getData()->credits;