<?php

namespace Piggy\Api\Resources\OAuth\Vouchers;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Vouchers\PromotionMapper;
use Piggy\Api\Mappers\Vouchers\PromotionsMapper;
use Piggy\Api\Models\Vouchers\Promotion;
use Piggy\Api\Resources\BaseResource;

class PromotionsResource extends BaseResource
{
    /**
     * @var string
     */
    protected $resourceUri = '/api/v3/oauth/clients/promotions';

    public function create(string $uuid, string $name, string $description): Promotion
    {
        $response = $this->client->post($this->resourceUri, [
            'uuid' => $uuid,
            'name' => $name,
            'description' => $description,
        ]);

        $mapper = new PromotionMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @return Promotion[]
     *
     * @throws PiggyRequestException
     */
    public function list(int $page = 1, int $limit = 30): array
    {
        $response = $this->client->get($this->resourceUri, [
            'page' => $page,
            'limit' => $limit,
        ]);

        $mapper = new PromotionsMapper();

        return $mapper->map((array) $response->getData());
    }
}
