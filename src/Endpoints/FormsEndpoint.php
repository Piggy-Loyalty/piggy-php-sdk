<?php

namespace Piggy\Api\Endpoints;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Forms\FormCollectionMapper;
use Piggy\Api\Models\Form;

class FormsEndpoint extends BaseEndpoint
{
    protected string $resourceUri = 'forms';

    /**
     * @param  mixed[]  $params
     * @return Form[]
     *
     * @throws PiggyRequestException
     */
    public function list(array $params = []): array
    {
        $response = $this->client->get($this->resourceUri, $params);

        $mapper = new FormCollectionMapper;

        return $mapper->map($response->getData());
    }
}
