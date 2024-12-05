<?php

namespace Piggy\Api\Endpoints;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Units\UnitCollectionMapper;
use Piggy\Api\Mappers\Units\UnitMapper;
use Piggy\Api\Models\Unit;

class UnitsEndpoint extends BaseEndpoint
{
    protected string $resourceUri = 'units';

    /**
     * List all units.
     *
     * @return Unit[]
     *
     * @throws PiggyRequestException
     */
    public function list(array $params = []): array
    {
        $response = $this->client->get($this->resourceUri, $params);

        return UnitCollectionMapper::map($response->getData());
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

        return UnitMapper::map($response->getData());
    }
}
