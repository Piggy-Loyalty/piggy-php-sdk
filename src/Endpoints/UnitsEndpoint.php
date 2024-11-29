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
     * @param  mixed[]  $params
     * @return Unit[]
     *
     * @throws PiggyRequestException
     */
    public function list(array $params = []): array
    {
        $response = $this->client->get($this->resourceUri, $params);

        $mapper = new UnitCollectionMapper;

        return $mapper->map($response->getData());
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

        $mapper = new UnitMapper;

        return $mapper->map($response->getData());
    }
}
