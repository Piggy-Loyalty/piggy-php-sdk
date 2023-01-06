<?php

namespace Piggy\Api\Resources\OAuth\Loyalty\Tokens;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Loyalty\Tokens\LoyaltyTokenMapper;
use Piggy\Api\Mappers\Loyalty\Tokens\LoyaltyTokensMapper;
use Piggy\Api\Models\Loyalty\Tokens\LoyaltyToken;
use Piggy\Api\Resources\BaseResource;

class LoyaltyTokenResource extends BaseResource
{
    /**
     * @var string
     */
    protected $resourceUri = "/api/v3/oauth/clients/loyalty-tokens";

    /**
     * @param string $shopId
     * @param string $uniqueId
     * @param int $credits
     * @return string
     * @throws PiggyRequestException
     */
    public function create(string $shopId, string $uniqueId, int $credits): string
    {
        $inputValues = [
            "shop_id" => $shopId,
            "unique_id" => $uniqueId,
            "credits" => $credits
        ];

        $response = $this->client->post($this->resourceUri."/create", $inputValues);

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
    public function claim($version, string $shopId, string $uniqueId, string $timeStamp, string $hash, string $contactUuid): LoyaltyToken
    {
        $inputValues = [
                "version" => "required|string",
                "shop_id" => "required",
                "unique_id" => "required",
                "timestamp" => "required",
                "hash" => "required|string",
                "contact_uuid" => "required'"
            ];

        $response = $this->client->post($this->resourceUri, $inputValues);

        $mapper = new LoyaltyTokensMapper();

        return $response->getData()->loyaltyToken;
    }
}

//$response = $this->client->get($this->resourceUri."/calculate", $data);
//
//return (int)$response->getData()->credits;