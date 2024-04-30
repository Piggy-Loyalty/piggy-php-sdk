<?php

namespace Piggy\Api\Resources\Register\Registers;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Registers\RegisterMapper;
use Piggy\Api\Models\Registers\Register;
use Piggy\Api\Resources\BaseResource;

/**
 * Class RegisterResource
 */
class RegisterResource extends BaseResource
{
    /**
     * @var string
     */
    protected $resourceUri = '/api/v3/register';

    /**
     * @throws PiggyRequestException
     */
    public function get(): Register
    {
        $response = $this->client->get($this->resourceUri);

        $mapper = new RegisterMapper();

        return $mapper->map($response->getData());
    }
}
