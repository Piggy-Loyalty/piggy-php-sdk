<?php

namespace Piggy\Api\Endpoints;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Tier\TierCollectionMapper;
use Piggy\Api\Models\Tier;

class TiersEndpoint extends BaseEndpoint
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

        return TierCollectionMapper::map($response->getData());
    }
}
