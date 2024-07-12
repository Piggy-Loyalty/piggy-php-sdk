<?php

namespace Piggy\Api\Resources\OAuth\Tiers;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Models\Tiers\Perk;
use Piggy\Api\Models\Tiers\Tier;
use Piggy\Api\Resources\BaseResource;
use Piggy\Api\StaticMappers\Tiers\PerkMapper;
use Piggy\Api\StaticMappers\Tiers\PerksMapper;

class PerksResource extends BaseResource
{
    /**
     * @var string
     */
    protected $resourceUri = '/api/v3/oauth/clients/perks';

    /**
     * @param  mixed[]  $params
     * @return Tier[]
     *
     * @throws PiggyRequestException
     */
    public function list(array $params = []): array
    {
        $response = $this->client->get($this->resourceUri, $params);

        $mapper = new PerksMapper();

        return $mapper->map((array) $response->getData());
    }

    /**
     * @throws PiggyRequestException
     */
    public function create(string $label, string $name, string $dataType): array
    {
        $response = $this->client->post($this->resourceUri, [
            'label' => $label,
            'name' => $name,
            'dataType' => $dataType,
        ]);

        return $response->getData();
    }

    /**
     * @param  mixed[]  $params
     *
     * @throws PiggyRequestException
     */
    public function get(string $perkUuid, array $params = []): Perk
    {
        $response = $this->client->get("$this->resourceUri/$perkUuid", $params);

        $mapper = new PerkMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @throws PiggyRequestException
     */
    public function update(string $perkUuid, string $label, string $name, string $dataType): array
    {
        $response = $this->client->put("$this->resourceUri/$perkUuid", [
            'label' => $label,
            'name' => $name,
            'dataType' => $dataType,
        ]);

        return $response->getData();
    }
}
