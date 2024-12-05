<?php

namespace Piggy\Api\Endpoints;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Units\UnitCollectionMapper;
use Piggy\Api\Mappers\Units\UnitMapper;
use Piggy\Api\Models\Unit;
use stdClass;
use UnexpectedValueException;

class UnitsEndpoint extends BaseEndpoint
{
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

        $responseData = $response->getData();

        if (! is_array($responseData)) {
            throw new UnexpectedValueException('Expected response data to be of type array.');
        }

        return (new UnitCollectionMapper)
            ->map($responseData);
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

        $responseData = $response->getData();

        if (! $responseData instanceof stdClass) {
            throw new UnexpectedValueException('Expected response data to be of type stdClass.');
        }

        return (new UnitMapper)
            ->map($responseData);
    }
}
