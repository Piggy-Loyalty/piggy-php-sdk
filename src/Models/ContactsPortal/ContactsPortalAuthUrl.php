<?php

namespace Piggy\Api\Models\ContactsPortal;

use Piggy\Api\Environment;
use Piggy\Api\Mappers\ContactsPortal\ContactsPortalAuthUrlMapper;

/**
 * Class Shop
 * @package Piggy\Api\Models\Shops
 */
class ContactsPortalAuthUrl
{
    /**
     * @var string
     */
    protected $url;

    /**
     * @param string $url
     */

    /**
     * @var string
     */
    protected static $resourceUri = "/api/v3/oauth/clients/contacts-portal";

    /**
     * @var string
     */
    protected static $mapper = ContactsPortalAuthUrlMapper::class;

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
     * @return ContactsPortalAuthUrl
     * @throws \Piggy\Api\Exceptions\PiggyRequestException
     */
    public static function get(array $params): ContactsPortalAuthUrl
    {
        $response = Environment::get(self::$resourceUri . "/auth-url", $params);

        $mapper = new self::$mapper();

        return $mapper->map($response->getData());
    }
}
