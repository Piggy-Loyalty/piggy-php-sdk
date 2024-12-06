<?php

namespace Piggy\Api\Endpoints;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Units\UnitCollectionMapper;
use Piggy\Api\Mappers\Units\UnitMapper;
use Piggy\Api\Models\Unit;
use Piggy\Api\Traits\Endpoints\ResponseToModelCollectionMapper;
use Piggy\Api\Traits\Endpoints\ResponseToModelMapper;

class UnitsEndpoint extends BaseEndpoint
{
    /** @template-use ResponseToModelCollectionMapper<Unit> */
    use ResponseToModelCollectionMapper;

    /** @template-use ResponseToModelMapper<Unit> */
    use ResponseToModelMapper;

    protected string $resourceUri = 'units';

    /**
     * List all units.
     *
     * @param  mixed[]  $params
     * @return Unit[]
     *
     * @throws PiggyRequestException
     */
    public function list(array $params = []): array
    {
        $response = $this->client->get($this->resourceUri, $params);

        return self::mapToList(
            response: $response,
            mapper: UnitCollectionMapper::class
        );
    }

    /**
     * @throws PiggyRequestException
     */
    public function create(
        string $name,
        string $label,
        string $prefix,
        ?bool $isDefault = null
    ): Unit {
        $response = $this->client->post($this->resourceUri, [
            'name' => $name,
            'label' => $label,
            'prefix' => $prefix,
            'is_default' => $isDefault,
        ]);

        return self::mapToModel(
            response: $response,
            mapper: UnitMapper::class
        );
    }
}
