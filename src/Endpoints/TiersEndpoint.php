<?php

namespace Piggy\Api\Endpoints;

use Piggy\Api\Contracts\Endpoints\HasList;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Tier\TierCollectionMapper;
use Piggy\Api\Models\Tier;

class TiersEndpoint extends BaseEndpoint implements HasList
{
    protected string $resourceUri = 'tiers';

    /**
     * List all tiers.
     *
     * @return Tier[]
     *
     * @throws PiggyRequestException
     */
    public function list(array $params = []): array
    {
        $response = $this->client->get($this->resourceUri, $params);

        $mapper = new TierCollectionMapper;

        return $mapper->map($response->getData());
    }
}
