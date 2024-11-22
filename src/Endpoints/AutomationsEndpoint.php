<?php

namespace Piggy\Api\Endpoints;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Automations\AutomationCollectionMapper;
use Piggy\Api\Models\Automation;

class AutomationsEndpoint extends BaseEndpoint
{
    protected string $resourceUri = 'automations';

    /**
     * @param  mixed[]  $params
     * @return Automation[]
     *
     * @throws PiggyRequestException
     */
    public function list(array $params = []): array
    {
        $response = $this->client->get($this->resourceUri, $params);

        $mapper = new AutomationCollectionMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param  mixed[]|null  $data
     *
     * @throws PiggyRequestException
     */
    public function create(string $contactUuid, string $automationUuid, ?array $data = null): string
    {
        $response = $this->client->post("$this->resourceUri/runs", [
            'contact_uuid' => $contactUuid,
            'automation_uuid' => $automationUuid,
            'data' => $data,
        ]);

        return $response->getData();
    }
}
