<?php

namespace Piggy\Api\Resources\OAuth\Loyalty\Rewards;

use Exception;
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
     * @param string|null $shop_uuid
     * @return array
     * @throws GuzzleException
     * @throws PiggyRequestException
     * @throws Exception
     */
    public function get(?string $contactUuid = null, ?string $shop_uuid = null): array
    {
        $response = $this->client->get($this->resourceUri, [
            "contact_uuid" => $contactUuid,
            "shop_uuid" => $shop_uuid
        ]);
        $mapper = new RewardsMapper();

        return $mapper->map($response->getData());
    }
}
