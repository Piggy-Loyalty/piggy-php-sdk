<?php

namespace Piggy\Api\Endpoints;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\Exceptions\AuthorizationException;
use Piggy\Api\Exceptions\MaintenanceModeException;
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
     * @throws GuzzleException
     * @throws MaintenanceModeException
     * @throws PiggyRequestException
     * @throws AuthorizationException
     * @throws Exception
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
