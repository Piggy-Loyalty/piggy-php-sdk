<?php

namespace Piggy\Api\Endpoints;

use Piggy\Api\Contracts\Endpoints\HasList;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Forms\FormCollectionMapper;
use Piggy\Api\Models\Form;

class FormsEndpoint extends BaseEndpoint implements HasList
{
    protected string $resourceUri = 'forms';

    /**
     * List all forms.
     *
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
