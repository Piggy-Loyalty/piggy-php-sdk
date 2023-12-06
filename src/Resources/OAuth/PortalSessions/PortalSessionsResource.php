<?php


namespace Piggy\Api\Resources\OAuth\PortalSessions;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\PortalSessions\PortalSessionMapper;
use Piggy\Api\Models\PortalSessions\PortalSession;
use Piggy\Api\Resources\BaseResource;

/**
 * Class PortalSessionsResource
 * @package Piggy\Api\Resources\OAuth\PortalSessions
 * @deprecated
 */
class PortalSessionsResource extends BaseResource
{
    /**
     * @var string
     */
    protected $resourceUri = "/api/v3/oauth/clients/portal-sessions";

    /**
     * @param string $shopUuid
     * @param string|null $contactUuid
     * @return PortalSession
     * @throws PiggyRequestException
     */
    public function create(string $shopUuid, ?string $contactUuid = null): PortalSession
    {
        $response = $this->client->post($this->resourceUri, [
            "shop_uuid" => $shopUuid,
            "contact_uuid" => $contactUuid,
        ]);

        $mapper = new PortalSessionMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param string $uuid
     * @return PortalSession
     * @throws PiggyRequestException
     */
    public function get(string $uuid): PortalSession
    {
        $response = $this->client->get("$this->resourceUri/$uuid");

        $mapper = new PortalSessionMapper();

        return $mapper->map($response->getData());
    }
}