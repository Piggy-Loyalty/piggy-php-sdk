<?php

namespace Piggy\Api\Resources\OAuth\Loyalty\Rewards;

use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Loyalty\Receptions\RewardReceptionMapper;
use Piggy\Api\Models\Loyalty\RewardReceptions\PhysicalRewardReception;
use Piggy\Api\Models\Loyalty\RewardReceptions\RewardReception;
use Piggy\Api\Resources\BaseResource;

/**
 * Class RewardReceptionsResource
 * @package Piggy\Api\Resources\OAuth\Loyalty\Rewards
 */
class RewardReceptionsResource extends BaseResource
{
    /**
     * @var string
     */
    protected $resourceUri = "/api/v3/oauth/clients/reward-receptions";

    /**
     * @param string $contactUuid
     * @param string $contactIdentifierValue
     * @param string $rewardUuid
     * @param string $shopUuid
     * @return RewardReception
     * @throws GuzzleException
     * @throws PiggyRequestException
     */
    public function create(string $contactUuid, string $contactIdentifierValue, string $rewardUuid, string $shopUuid): RewardReception
    {
        $response = $this->client->post($this->resourceUri, [
            "contact_uuid" => $contactUuid,
            "contact_identifier_value" => $contactIdentifierValue,
            "reward_uuid" => $rewardUuid,
            "shop_uuid" => $shopUuid,
        ]);

        $mapper = new RewardReceptionMapper();

        return $mapper->map($response->getData());
    }
}
