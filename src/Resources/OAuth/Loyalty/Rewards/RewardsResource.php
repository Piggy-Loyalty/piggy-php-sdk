<?php

namespace Piggy\Api\Resources\OAuth\Loyalty\Rewards;

use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Loyalty\Rewards\RewardsMapper;
use Piggy\Api\Resources\BaseResource;

/**
 * Class RewardsResource
 * @package Piggy\Api\Resources\OAuth\Loyalty\Rewards
 */
class RewardsResource extends BaseResource
{
    /**
     * @var string
     */
    protected $resourceUri = "/api/v3/oauth/clients/rewards";

    /**
     * @param string|null $contactUuid
     * @return array
     * @throws GuzzleException
     * @throws PiggyRequestException
     */
    public function all(?string $contactUuid = null): array
    {
        $response = $this->client->get($this->resourceUri, [
            "contact_uuid" => $contactUuid
        ]);
        $mapper = new RewardsMapper();

        return $mapper->map($response->getData());
    }
}
