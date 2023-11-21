<?php

namespace Piggy\Api\Models\Contacts;

use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\ApiClient;
use Piggy\Api\Exceptions\MaintenanceModeException;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\StaticMappers\ContactIdentifiers\ContactIdentifierMapper;

/**
 * Class ContactIdentifier
 * @package Piggy\Api\Models\Contacts
 */
class ContactIdentifier
{
    /**
     * @var string
     */
    protected $value;

    /**
     * @var string|null
     */
    protected $name;

    /**
     * @var Contact|null
     */
    protected $contact;

    /**
     * @var bool
     */
    protected $active;

    /**
     * @var string
     */
    protected static $resourceUri = "/api/v3/oauth/clients/contact-identifiers";

    /**
     * @param string $value
     * @param bool $active
     * @param string|null $name
     * @param Contact|null $contact
     */
    public function __construct(string $value, bool $active, ?string $name = '', ?Contact $contact = null)
    {
        $this->value = $value;
        $this->name = $name;
        $this->active = $active;
        $this->contact = $contact;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return bool|null
     */
    public function isActive(): ?bool
    {
        return $this->active;
    }

    /**
     * @return Contact|null
     */
    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    /**
     * @param array $params
     * @return ContactIdentifier
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function get(array $params = []): ContactIdentifier
    {
        $response = ApiClient::get(self::$resourceUri . "/find", $params);

        return ContactIdentifierMapper::map($response->getData());
    }

    /**
     * @param array $params
     * @return ContactIdentifier
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function create(array $params): ContactIdentifier
    {
        $response = ApiClient::post(self::$resourceUri, $params);

        return ContactIdentifierMapper::map($response->getData());
    }

    /**
     * @param array $params
     * @return ContactIdentifier
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException|PiggyRequestException
     */
    public static function link(array $params): ContactIdentifier
    {
        $response = ApiClient::put(self::$resourceUri . "/link", $params);

        return ContactIdentifierMapper::map($response->getData());
    }
}
