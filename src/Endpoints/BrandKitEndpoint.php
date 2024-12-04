<?php

namespace Piggy\Api\Endpoints;

use Piggy\Api\Contracts\Endpoints\HasGet;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\BrandKit\BrandKitMapper;
use Piggy\Api\Models\BrandKit;

class BrandKitEndpoint extends BaseEndpoint implements HasGet
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

        $mapper = new BrandKitMapper;

        return $mapper->map($response->getData());
    }
}
