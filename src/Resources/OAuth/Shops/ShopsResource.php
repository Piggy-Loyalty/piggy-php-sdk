<?php

namespace Piggy\Api\Resources\OAuth\Shops;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Shops\ShopMapper;
use Piggy\Api\Mappers\Shops\ShopsMapper;
use Piggy\Api\Models\Shops\Shop;
use Piggy\Api\Resources\BaseResource;

/**
 * Class ShopsResource
 * @package Piggy\Api\Resources\OAuth\Shops
 */
class ShopsResource extends BaseResource
{
    /**
     * @var string
     */
    protected $resourceUri = "/api/v3/oauth/clients/shops";

    /**
     * @return array
     * @throws PiggyRequestException
     */
    public function all(): array
    {
        $response = $this->client->get($this->resourceUri, []);

        $mapper = new ShopsMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param string $shopUuid
     * @return Shop
     * @throws PiggyRequestException
     */
    public function get(string $shopUuid): Shop
    {
        $response = $this->client->get("$this->resourceUri/$shopUuid", []);

        $mapper = new ShopMapper();

        return $mapper->map($response->getData());
    }
}
