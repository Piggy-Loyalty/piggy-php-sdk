<?php

namespace Piggy\Api\Endpoints;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Forms\FormCollectionMapper;
use Piggy\Api\Models\Form;

class FormsEndpoint extends BaseEndpoint
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

        return FormCollectionMapper::map($response->getData());
    }
}
