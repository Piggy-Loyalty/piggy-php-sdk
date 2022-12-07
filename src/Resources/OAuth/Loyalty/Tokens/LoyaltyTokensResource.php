<?php

namespace Piggy\Api\Resources\OAuth\Loyalty\Tokens;

use App\Piggy\Models\Interfaces\CreditReceptionInterface;
use Piggy\Api\Mappers\Loyalty\LoyaltyTokensMapper;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Resources\BaseResource;
use Piggy\Api\Models\Loyalty\LoyaltyTokens;

class LoyaltyTokensResource extends BaseResource
{
    /**
     * @var string
     */
    protected $resourceUri = "/api/v3/oauth/clients/loyalty-tokens";

    /**
     * @param string $version
     * @param string $shopId
     * @param string $uniqueId
     * @param string $timeStamp
     * @param string $hash
     * @param string $contactUuid
     * @return LoyaltyTokens
     * @throws PiggyRequestException
     */

    public function claim($version, string $shopId, string $uniqueId, string $timeStamp, string $hash, string $contactUuid): LoyaltyTokens
    {
        $data = [
                "version" => "required|string",
                "shop_id" => "required",
                "unique_id" => "required",
                "timestamp" => "required",
                "hash" => "required|string",
                "contact_uuid" => "required'"
            ];

        $response = $this->client->post($this->resourceUri, $data);


//        $mapper = new LoyaltyTokensMapper();

        return $response->getCreditReception();

    }
}