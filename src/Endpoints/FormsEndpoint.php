<?php

namespace Piggy\Api\Endpoints;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\Exceptions\AuthorizationException;
use Piggy\Api\Exceptions\MaintenanceModeException;
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
     * @throws GuzzleException
     * @throws MaintenanceModeException
     * @throws PiggyRequestException
     * @throws AuthorizationException
     * @throws Exception
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
