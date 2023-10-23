<?php

namespace Piggy\Api\Resources\OAuth\Zapier;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Zapier\ZapierWebhookMapper;
use Piggy\Api\Models\Zapier\ZapierWebhook;
use Piggy\Api\Resources\BaseResource;

/**
 * Class ZapierWebhookResource
 * @package Piggy\Api\Resources\OAuth\Giftcards
 */
class ZapierWebhookResource extends BaseResource
{
    /**
     * @var string
     */
    protected $resourceUri = "/api/v3/oauth/clients/zapier";

    public function create(string $type, string $url): ZapierWebhook
    {
        $response = $this->client->post("$this->resourceUri/webhook", [
            "type" => $type,
            "url" => $url
        ]);

        $mapper = new ZapierWebhookMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param int $id
     * @throws PiggyRequestException
     */
    public function destroy(int $id): string
    {
        $response = $this->client->destroy("$this->resourceUri/webhook/$id");

        return $response->getData();
    }
}
