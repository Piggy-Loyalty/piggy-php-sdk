<?php

namespace Piggy\Api\Endpoints;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\BrandKit\BrandKitMapper;
use Piggy\Api\Models\BrandKit;
use Piggy\Api\Traits\Endpoints\ResponseToModelMapper;

class BrandKitEndpoint extends BaseEndpoint
{
    /** @template-use ResponseToModelMapper<BrandKit> */
    use ResponseToModelMapper;

    protected string $resourceUri = 'brand-kit';

    /**
     * Get the brand kit.
     *
     * @param  mixed[]  $params
     *
     * @throws PiggyRequestException
     */
    public function get(array $params = []): BrandKit
    {
        $response = $this->client->get($this->resourceUri, $params);

        return self::mapToModel(
            response: $response,
            mapper: BrandKitMapper::class
        );
    }
}
