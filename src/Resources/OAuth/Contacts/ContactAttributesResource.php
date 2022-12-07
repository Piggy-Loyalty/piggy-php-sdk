<?php

namespace Piggy\Api\Resources\OAuth\Contacts;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Contacts\AttributesMapper;
use Piggy\Api\Resources\BaseResource;

/**
 * Class ContactAttributesResource
 * @package Piggy\Api\Resources\OAuth
 */
class ContactAttributesResource extends BaseResource
{
    /**
     * @var string
     */
    protected $resourceUri = "/api/v3/oauth/clients/contact-attributes";

    /**
     * @param int $page
     * @param int $limit
     * @return array
     * @throws PiggyRequestException
     */
    public function list(int $page = 1, int $limit = 30): array
    {
        $response = $this->client->get($this->resourceUri, [
            "page" => $page,
            "limit" => $limit,
        ]);

        $mapper = new AttributesMapper();

        return $mapper->map($response->getData());
    }
}