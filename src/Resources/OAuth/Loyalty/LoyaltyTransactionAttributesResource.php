<?php

namespace Piggy\Api\Resources\OAuth\Contacts;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Resources\BaseResource;

/**
 * Class LoyaltyTransactionAttributesResource
 * @package Piggy\Api\Resources\OAuth
 */
class LoyaltyTransactionAttributesResource extends BaseResource
{
    /**
     * @var string
     */
    protected $resourceUri = "/api/v3/oauth/clients/loyalty-transaction-attributes";

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

        $mapper = new LoyaltyTransactionAttributesMapper;

        return $mapper->map($response->getData());
    }

}