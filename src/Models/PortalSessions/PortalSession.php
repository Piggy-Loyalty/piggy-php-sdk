<?php

namespace Piggy\Api\Models\PortalSessions;

use DateTime;
use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\ApiClient;
use Piggy\Api\Exceptions\MaintenanceModeException;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Models\Contacts\Contact;
use Piggy\Api\Models\Shops\Shop;
use Piggy\Api\StaticMappers\PortalSessions\PortalSessionMapper;

/**
 *
 */
class PortalSession
{
    /**
     * @var string
     */
    protected $uuid;
    /**
     * @var string
     */
    protected $url;
    /**
     * @var Contact|null
     */
    protected $contact;
    /**
     * @var Shop
     */
    protected $shop;

    /**
     * @var DateTime
     */
    protected $created_at;

    /**
     * @var string
     */
    const resourceUri = "/api/v3/oauth/clients/portal-sessions";

    /**
     * @param string $url
     * @param string $uuid
     * @param Shop $shop
     * @param DateTime $createdAt
     * @param Contact|null $contact
     */
    public function __construct(
        string   $url,
        string   $uuid,
        Shop     $shop,
        DateTime $createdAt,
        ?Contact $contact
    )
    {
        $this->url = $url;
        $this->uuid = $uuid;
        $this->shop = $shop;
        $this->created_at = $createdAt;
        $this->contact = $contact;
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return Contact
     */
    public function getContact(): Contact
    {
        return $this->contact;
    }

    /**
     * @return Shop
     */
    public function getShop(): Shop
    {
        return $this->shop;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->created_at;
    }

    /**
     * @param array $body
     * @return PortalSession
     * @throws GuzzleException
     * @throws MaintenanceModeException
     * @throws PiggyRequestException
     */
    public static function create(array $body): PortalSession
    {
        $response = ApiClient::post(self::resourceUri, $body);

        return PortalSessionMapper::map($response->getData());
    }

    /**
     * @param string $uuid
     * @param array $params
     * @return PortalSession
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function get(string $uuid, array $params = []): PortalSession
    {
        $response = ApiClient::get(self::resourceUri . "/$uuid", $params);

        return PortalSessionMapper::map($response->getData());
    }
}
