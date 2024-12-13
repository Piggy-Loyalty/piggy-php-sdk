<?php

namespace Piggy\Api\Endpoints;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\BusinessProfiles\BusinessProfileCollectionMapper;
use Piggy\Api\Mappers\BusinessProfiles\BusinessProfileMapper;
use Piggy\Api\Models\BusinessProfile\BusinessProfile;
use Piggy\Api\Traits\Endpoints\ResponseToModelCollectionMapper;
use Piggy\Api\Traits\Endpoints\ResponseToModelMapper;

class BusinessProfilesEndpoint extends BaseEndpoint
{
    /** @template-use ResponseToModelCollectionMapper<BusinessProfile> */
    use ResponseToModelCollectionMapper;

    /** @template-use ResponseToModelMapper<BusinessProfile> */
    use ResponseToModelMapper;

    protected string $resourceUri = 'business-profiles';

    /**
     * List all business profiles.
     *
     * @param  mixed[]  $params
     * @return BusinessProfile[]
     *
     * @throws PiggyRequestException
     */
    public function list(array $params = []): array
    {
        $response = $this->client->get($this->resourceUri, $params);

        return self::mapToList(
            response: $response,
            mapper: BusinessProfileCollectionMapper::class
        );
    }

    /**
     * @throws PiggyRequestException
     */
    public function show(string $uuid): BusinessProfile
    {
        $response = $this->client->get("$this->resourceUri/$uuid");

        return self::mapToModel(
            response: $response,
            mapper: BusinessProfileMapper::class
        );
    }
}
