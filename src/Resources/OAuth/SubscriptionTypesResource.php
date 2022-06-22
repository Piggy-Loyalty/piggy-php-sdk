<?php

namespace Piggy\Api\Resources\OAuth;

use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Contacts\SubscriptionTypesMapper;
use Piggy\Api\Resources\BaseResource;

/**
 * Class SubscriptionTypesResource
 * @package Piggy\Api\Resources\OAuth
 */
class SubscriptionTypesResource extends BaseResource
{
    /**
     * @var string
     */
    protected $resourceUri = "api/v3/oauth/clients/subscription-types";

    /**
     * @return array
     * @throws GuzzleException
     * @throws PiggyRequestException
     */
    public function list(): array
    {
        $response = $this->client->get($this->resourceUri);

        $mapper = new SubscriptionTypesMapper();

        return $mapper->map($response->getData());
    }
}
