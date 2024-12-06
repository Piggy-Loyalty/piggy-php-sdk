<?php

namespace Piggy\Api\Endpoints;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Tier\TierCollectionMapper;
use Piggy\Api\Models\Tier;
use UnexpectedValueException;

class TiersEndpoint extends BaseEndpoint
{
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

        $responseData = $response->getData();

        if (! is_array($responseData)) {
            throw new UnexpectedValueException('Expected response data to be of type array.');
        }

        return TierCollectionMapper::map($responseData);
    }
}
