<?php

namespace Piggy\Api\Endpoints;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Tier\TierCollectionMapper;
use Piggy\Api\Models\Tier;
use Piggy\Api\Traits\Endpoints\ResponseToModelCollectionMapper;

class TiersEndpoint extends BaseEndpoint
{
    /** @template-use ResponseToModelCollectionMapper<Tier> */
    use ResponseToModelCollectionMapper;

    protected string $resourceUri = 'tiers';

    /**
     * List all tiers.
     *
     * @param  mixed[]  $params
     * @return Tier[]
     *
     * @throws PiggyRequestException
     */
    public function list(array $params = []): array
    {
        $response = $this->client->get($this->resourceUri, $params);

        return self::mapToList(
            response: $response,
            mapper: TierCollectionMapper::class
        );
    }
}
