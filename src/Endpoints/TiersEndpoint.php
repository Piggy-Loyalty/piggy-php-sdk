<?php

namespace Piggy\Api\Endpoints;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Tier\TierCollectionMapper;
use Piggy\Api\Models\Tier;

class TiersEndpoint extends BaseEndpoint
{
    protected string $resourceUri = 'tiers';

    /**
     * @param  mixed[]  $params
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
