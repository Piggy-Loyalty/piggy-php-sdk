<?php

namespace Piggy\Api\Endpoints;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Forms\FormCollectionMapper;
use Piggy\Api\Models\Form;
use UnexpectedValueException;

class FormsEndpoint extends BaseEndpoint
{
    protected string $resourceUri = 'forms';

    /**
     * List all forms.
     *
     * @param  mixed[]  $params
     * @return Form[]
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

        return (new FormCollectionMapper)
            ->map($responseData);
    }
}
