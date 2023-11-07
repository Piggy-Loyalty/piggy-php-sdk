<?php

namespace Piggy\Api\Models\Contacts;

use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\Environment;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\ContactIdentifiers\ContactIdentifierMapper;

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
     * @var string
     */
    protected static $mapper = ContactIdentifierMapper::class;

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
     * @throws GuzzleException
     */
    public static function get(array $params = []): ContactIdentifier
    {
        $response = Environment::get(self::$resourceUri . "/find", $params);

        $mapper = new self::$mapper;

        return $mapper->map($response->getData());
    }

    /**
     * @param array $body
     * @return ContactIdentifier
     * @throws GuzzleException
     */
    public static function create(array $body): ContactIdentifier
    {
        $response = Environment::post(self::$resourceUri, $body);

        $mapper = new self::$mapper;

        return $mapper->map($response->getData());
    }

    /**
     * @param array $body
     * @return ContactIdentifier
     * @throws GuzzleException|PiggyRequestException
     */
    public static function link(array $body): ContactIdentifier
    {
        $response = Environment::put(self::$resourceUri . "/link", $body);

        $mapper = new self::$mapper;

        return $mapper->map($response->getData());
    }
}
