<?php

namespace Piggy\Api\Resources\OAuth;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Contacts\SubscriptionTypesMapper;
use Piggy\Api\Models\Contacts\SubscriptionType;
use Piggy\Api\Resources\BaseResource;

class SubscriptionTypesResource extends BaseResource
{
    /**
     * @var string
     */
    protected $resourceUri = '/api/v3/oauth/clients/subscription-types';

    /**
     * @return SubscriptionType[]
     *
     * @throws PiggyRequestException
     */
    public function list(): array
    {
        $response = $this->client->get($this->resourceUri);

        $mapper = new SubscriptionTypesMapper();

        return $mapper->map($response->getData());
    }
}
