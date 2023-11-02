<?php

namespace Piggy\Api\Models\Contacts;

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
     * @param string $contactIdentifierValue
     * @param array $params
     * @return ContactIdentifier
     * @throws PiggyRequestException
     */
    public static function get(array $params = []): ContactIdentifier
    {
        $response = Environment::get(self::$resourceUri . "/find", $params);

        $mapper = new self::$mapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param string $contactIdentifierValue
     * @param string|null $contactUuid
     * @param string|null $contactIdentifierName
     * @return ContactIdentifier
     * @throws PiggyRequestException
     */
    public static function create(array $body): ContactIdentifier
    {
        $response = Environment::post(self::$resourceUri, $body);

        $mapper = new self::$mapper();

        return $mapper->map($response->getData());
    }

    public static function link(array $body): ContactIdentifier
    {
        $response = Environment::put(self::$resourceUri . "/link", $body);

        $mapper = new self::$mapper();

        return $mapper->map($response->getData());
    }
}
