<?php

namespace Piggy\Api\Endpoints;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Forms\FormCollectionMapper;
use Piggy\Api\Models\Form;
use Piggy\Api\Traits\Endpoints\ResponseToModelCollectionMapper;

class FormsEndpoint extends BaseEndpoint
{
    /** @template-use ResponseToModelCollectionMapper<Form> */
    use ResponseToModelCollectionMapper;

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

        return self::mapToList(
            response: $response,
            mapper: FormCollectionMapper::class
        );
    }
}
