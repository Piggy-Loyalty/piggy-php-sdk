<?php

namespace Piggy\Api\Endpoints;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\BrandKit\BrandKitMapper;
use Piggy\Api\Models\BrandKit;

class BrandKitEndpoint extends BaseEndpoint
{
    protected string $resourceUri = 'brand-kit';

    /**
     * @param mixed[] $params
     *
     * @throws PiggyRequestException
     */
    public function get(array $params = []): BrandKit
    {
        $response = $this->client->get($this->resourceUri);

        $mapper = new BrandKitMapper();

        return $mapper->map($response->getData());
    }
}
