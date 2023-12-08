<?php

namespace Piggy\Api\Models\ContactsPortal;

use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\ApiClient;
use Piggy\Api\Exceptions\MaintenanceModeException;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\StaticMappers\ContactsPortal\ContactsPortalMapper;

/**
 * Class Shop
 * @package Piggy\Api\Models\Shops
 */
class ContactsPortal
{
    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    const resourceUri = "/api/v3/oauth/clients/contacts-portal";

    /**
     * @param string $url
     */
    public function __construct(string $url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param array $params
     * @return ContactsPortal
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function getAuthUrl(array $params): ContactsPortal
    {
        $response = ApiClient::get(self::resourceUri . "/auth-url", $params);

        return ContactsPortalMapper::map($response->getData());
    }
}
