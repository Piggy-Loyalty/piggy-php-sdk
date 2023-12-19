<?php

namespace Piggy\Api\Resources\OAuth\Forms;


use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Forms\FormsMapper;
use Piggy\Api\Resources\BaseResource;

/**
 * Class FormsResource
 * @package Piggy\Api\Resources\OAuth\Forms
 */
class FormsResource extends BaseResource
{
    /**
     * @var string
     */
    protected $resourceUri = "/api/v3/oauth/clients/forms";

    /**
     * @return array[]
     * @throws PiggyRequestException
     */
    public function list(?string $type = null, ?string $status = null): array
    {
        $response = $this->client->get("$this->resourceUri", [
            "type" => $type,
            "status" => $status
        ]);

        $mapper = new FormsMapper();
        return $mapper->map((array)$response->getData());
    }
}