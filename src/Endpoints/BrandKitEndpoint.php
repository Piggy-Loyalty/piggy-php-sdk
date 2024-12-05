<?php

namespace Piggy\Api\Endpoints;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\BrandKit\BrandKitMapper;
use Piggy\Api\Models\BrandKit;

class BrandKitEndpoint extends BaseEndpoint
{
    protected string $resourceUri = 'brand-kit';

    /**
     * Get the brand kit.
     *
     * @throws PiggyRequestException
     */
    public function get(array $params = []): BrandKit
    {
        $response = $this->client->get($this->resourceUri);

        return BrandKitMapper::map($response->getData());
    }
}
