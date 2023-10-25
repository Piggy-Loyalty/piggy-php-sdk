<?php

namespace Piggy\Api\Resources\OAuth\Loyalty\Rewards;

use Exception;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Loyalty\Rewards\CollectableRewardMapper;
use Piggy\Api\Mappers\Loyalty\Rewards\CollectableRewardsMapper;
use Piggy\Api\Models\Loyalty\Rewards\CollectableReward;
use Piggy\Api\Resources\BaseResource;

/**
 * Class RewardsResource
 * @package Piggy\Api\Resources\OAuth\Loyalty\Rewards
 */
class CollectableRewardsResource extends BaseResource
{
    /**
     * @var string
     */
    protected $resourceUri = "/api/v3/oauth/clients/collectable-rewards";

    /**
     * @param string $contactUuid
     * @return array
     * @throws PiggyRequestException
     * @throws Exception
     */
    public function list(string $contactUuid): array
    {
        $response = $this->client->get($this->resourceUri, [
            "contact_uuid" => $contactUuid,
        ]);

        $mapper = new CollectableRewardsMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param string $loyaltyTransactionUuid
     * @return CollectableReward
     * @throws PiggyRequestException
     */
    public function collect(string $loyaltyTransactionUuid): CollectableReward
    {
        $response = $this->client->put("$this->resourceUri/collect/{$loyaltyTransactionUuid}", []);

        $mapper = new CollectableRewardMapper();

        return $mapper->map($response->getData());
    }
}
