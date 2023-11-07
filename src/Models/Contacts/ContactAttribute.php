<?php

namespace Piggy\Api\Models\Contacts;

use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\Environment;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Contacts\AttributeMapper;
use Piggy\Api\Mappers\Contacts\AttributesMapper;

/**
 * Class ContactAttribute
 * @package Piggy\Api\Models\Contacts
 */
class ContactAttribute
{
    /** @var string */
    protected $value;

    /** @var Attribute */
    protected $attribute;

    /**
     * @var string
     */
    protected static $resourceUri = "/api/v3/oauth/clients/contact-attributes";

    public function __construct($value, $attribute)
    {
        $this->value = $value;
        $this->attribute = $attribute;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    /**
     * @return Attribute
     */
    public function getAttribute(): Attribute
    {
        return $this->attribute;
    }

    /**
     * @param Attribute $attribute
     */
    public function setAttribute(Attribute $attribute): void
    {
        $this->attribute = $attribute;
    }

    /**
     * @param array $params
     * @return array
     * @throws GuzzleException
     */
    public static function list(array $params = []): array
    {
        $response = Environment::get(self::$resourceUri, $params);

        $mapper = new AttributesMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param array $body
     * @return Attribute
     * @throws GuzzleException
     */
    public static function create(array $body): Attribute
    {
        $response = Environment::post(self::$resourceUri, $body);

        $mapper = new AttributeMapper();

        return $mapper->map($response->getData());
    }

}