<?php

namespace Piggy\Api\Resources\OAuth\Contacts;

use Piggy\Api\Enum\CustomAttributeTypes;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Contacts\AttributeMapper;
use Piggy\Api\Mappers\Contacts\AttributesMapper;
use Piggy\Api\Models\Contacts\Attribute;
use Piggy\Api\Resources\BaseResource;

/**
 * Class ContactAttributesResource
 * @package Piggy\Api\Resources\OAuth
 */
class ContactAttributesResource extends BaseResource
{
    /**
     * @var string
     */
    protected $resourceUri = "/api/v3/oauth/clients/contact-attributes";

    /**
     * @return array
     * @throws PiggyRequestException
     */
    public function list(): array
    {
        $response = $this->client->get($this->resourceUri, []); // todo make it work with list here and then try to remove it

        $mapper = new AttributesMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param string $name
     * @param string $label
     * @param string $type
     * @param null|string $fieldType
     * @param null|string $description
     * @param array|null $options
     * @return Attribute
     * @throws PiggyRequestException
     * @throws \Exception
     */
    public function create(string $name, string $label, string $type, ?string $fieldType = null, ?string $description = null, ?array $options = null): Attribute
    {
        $contactAttributes = [
            "name" => $name,
            "label" => $label,
            "data_type" => $type,
            "field_type" => $fieldType,
            "description" => $description,
            "options" => $options
        ];

        if (!CustomAttributeTypes::has($type)) {
            throw new \Exception("type {$type} invalid");
        }

        $response = $this->client->post($this->resourceUri, $contactAttributes);

        $mapper = new AttributeMapper();

        return $mapper->map($response->getData());
    }
}