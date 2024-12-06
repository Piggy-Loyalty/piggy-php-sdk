<?php

namespace Piggy\Api\Endpoints;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\BrandKit\BrandKitMapper;
use Piggy\Api\Models\BrandKit;
use stdClass;
use UnexpectedValueException;

class BrandKitEndpoint extends BaseEndpoint
{
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
        $response = $this->client->get($this->resourceUri);

        $responseData = $response->getData();

        if (! $responseData instanceof stdClass) {
            throw new UnexpectedValueException('Expected response data to be of type stdClass.');
        }

        return BrandKitMapper::map($responseData);
    }
}
