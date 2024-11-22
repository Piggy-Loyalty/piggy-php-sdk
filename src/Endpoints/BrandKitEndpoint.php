<?php

namespace Piggy\Api\Endpoints;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\BrandKitMapper;
use Piggy\Api\Models\BrandKit;

class BrandKitEndpoint extends BaseEndpoint
{
    protected string $resourceUri = 'brand-kit';

    /**
     * @throws PiggyRequestException
     */
    public function get(): BrandKit
    {
        $response = $this->client->get($this->resourceUri);

        $mapper = new BrandKitMapper();

        return $mapper->map($response->getData());
    }
}
