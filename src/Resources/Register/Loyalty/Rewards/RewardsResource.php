<?php

namespace Piggy\Api\Resources\Register\Loyalty\Rewards;

use Exception;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Loyalty\Rewards\RewardMapper;
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
     * @return array
     * @throws PiggyRequestException
     * @throws Exception
     */
    public function get(string $contactUuid): array
    {
        $response = $this->client->get($this->resourceUri, [
            "contact_uuid" => $contactUuid,
        ]);
        $mapper = new RewardsMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param Reward $reward
     *
     * @return Reward
     * @throws PiggyRequestException
     */
    public function update(Reward $reward): Reward
    {
        $data = array_merge([
            'title' => $reward->getTitle(),
            'description' => $reward->getDescription(),
            'required_credits' => $reward->getRequiredCredits(),
        ], $reward->getAttributes());

        $response = $this->client->put("$this->resourceUri/{$reward->getUuid()}", $data);
        $mapper = new RewardMapper();

        return $mapper->map($response->getData());
    }
}
