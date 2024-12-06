<?php

namespace Piggy\Api\Endpoints;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Automations\AutomationCollectionMapper;
use Piggy\Api\Models\Automation;
use UnexpectedValueException;

class AutomationsEndpoint extends BaseEndpoint
{
    protected string $resourceUri = 'automations';

    /**
     * List all automations.
     *
     * @param  mixed[]  $params
     * @return Automation[]
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

        return AutomationCollectionMapper::map($responseData);
    }

    /**
     * Create a new automation run.
     *
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

        $responseData = $response->getData();

        if (! is_string($responseData)) {
            throw new UnexpectedValueException('Expected response data to be of type string.');
        }

        return $responseData;
    }
}
