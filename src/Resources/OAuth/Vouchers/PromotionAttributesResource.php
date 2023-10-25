<?php

namespace Piggy\Api\Resources\OAuth\Vouchers;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Vouchers\PromotionAttributeMapper;
use Piggy\Api\Mappers\Vouchers\PromotionAttributesMapper;
use Piggy\Api\Models\Vouchers\PromotionAttribute;
use Piggy\Api\Resources\BaseResource;

/**
 * Class ContactAttributesResource
 * @package Piggy\Api\Resources\OAuth\Vouchers
 */
class PromotionAttributesResource extends BaseResource
{
    /**
     * @var string
     */
    protected $resourceUri = "/api/v3/oauth/clients/promotion-attributes";

    /**
     * @return array
     * @throws PiggyRequestException
     */
    public function list(): array
    {
        $response = $this->client->get($this->resourceUri, []);

        $mapper = new PromotionAttributesMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param string $name
     * @param string $label
     * @param string $type
     * @param null|string $description
     * @param array $options
     * @return PromotionAttribute
     * @throws PiggyRequestException
     * @throws \Exception
     */

    public function create(string $name, string $description, string $label, string $type, array $options): PromotionAttribute
    {
        $promotionAttribute = [
            "name" => $name,
            "description" => $description,
            "label" => $label,
            "type" => $type,
            "options" => $options
        ];

        $response = $this->client->post($this->resourceUri, $promotionAttribute);

        $mapper = new PromotionAttributeMapper();

        return $mapper->map($response->getData());
    }

    public function get($promotionAttributeId): PromotionAttribute
    {
        $response = $this->client->get("$this->resourceUri/$promotionAttributeId");

        $mapper = new PromotionAttributeMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @throws PiggyRequestException
     */
    public function update($promotionAttributeId, ?string $name, ?string $label, ?string $description, ?string $placeholder, ?string $type, ?array $options): PromotionAttribute
    {
        $response = $this->client->put("$this->resourceUri/$promotionAttributeId", [
            "name" => $name,
            "description" => $description,
            "label" => $label,
            "placeholder" => $placeholder,
            "type" => $type,
            "options" => $options,
            "id" => $promotionAttributeId
        ]);

        $mapper = new PromotionAttributeMapper();

        return $mapper->map($response->getData());
    }
}
