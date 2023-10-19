<?php

namespace Piggy\Api\Resources\OAuth\Tiers;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Tiers\TiersMapper;
use Piggy\Api\Resources\BaseResource;

/**
 * Class Tiers
 * @package Piggy\Api\Resources\OAuth
 */
class TiersResource extends BaseResource
{
    /**
     * @var string
     */
    protected $resourceUri = "/api/v3/oauth/clients/tiers";

    /**
     * @return array
     * @throws PiggyRequestException
     */
    public function list(): array
    {
        $response = $this->client->get($this->resourceUri, []);

        $mapper = new TiersMapper();

        return $mapper->map((array)$response->getData());
    }
}