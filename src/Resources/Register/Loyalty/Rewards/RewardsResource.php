<?php

namespace Piggy\Api\Resources\Register\Loyalty\Rewards;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Loyalty\Rewards\RewardsMapper;
use Piggy\Api\Models\Loyalty\Rewards\Reward;
use Piggy\Api\Resources\BaseResource;

/**
 * Class RewardsResource
 * @package Piggy\Api\Resources\Register\Loyalty\Rewards
 */
class RewardsResource extends BaseResource
{
    /**
     * @var string
     */
    protected $resourceUri = "/api/v3/register/rewards";

    /**
     * @param string $contactUuid
     *
     * @return Reward[]
     * @throws PiggyRequestException
     */
    public function get(string $contactUuid): array
    {
        $response = $this->client->get($this->resourceUri, [
            "contact_uuid" => $contactUuid,
        ]);
        $mapper = new RewardsMapper();

        return $mapper->map($response->getData());
    }
}
