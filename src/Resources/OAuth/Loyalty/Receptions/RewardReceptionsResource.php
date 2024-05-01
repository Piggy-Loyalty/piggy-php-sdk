<?php

namespace Piggy\Api\Resources\OAuth\Loyalty\Receptions;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Loyalty\Receptions\RewardReceptionMapper;
use Piggy\Api\Models\Loyalty\Receptions\DigitalRewardReception;
use Piggy\Api\Models\Loyalty\Receptions\PhysicalRewardReception;
use Piggy\Api\Resources\BaseResource;

class RewardReceptionsResource extends BaseResource
{
    /**
     * @var string
     */
    protected $resourceUri = '/api/v3/oauth/clients/reward-receptions';

    /**
     * @return DigitalRewardReception|PhysicalRewardReception|null
     *
     * @throws PiggyRequestException
     */
    public function create(string $contactUuid, string $shopUuid, string $rewardUuid)
    {
        $response = $this->client->post($this->resourceUri, [
            'contact_uuid' => $contactUuid,
            'reward_uuid' => $rewardUuid,
            'shop_uuid' => $shopUuid,
        ]);

        $mapper = new RewardReceptionMapper();

        return $mapper->map($response->getData());
    }
}
