<?php

namespace Piggy\Api\Resources\OAuth\ApiKeys;

use Piggy\Api\Mappers\ApiKeys\ApiKeyMapper;
use Piggy\Api\Models\ApiKeys\ApiKey;
use Piggy\Api\Resources\BaseResource;

/**
 * Class AutomationsResource
 * @package Piggy\Api\Resources\OAuth\Automations
 */
class ApiKeysResource extends BaseResource
{
    /**
     * @var string
     */

    protected $resourceUri = "/api/v1/business/accounts/159/api-keys";

    public function create(): ApiKey
    {
        $response = $this->client->post($this->resourceUri, []);

        $mapper = new ApiKeyMapper();

        return $mapper->map($response->getData());
    }
}
