<?php

namespace Piggy\Api\Resources\OAuth\ContactAttributes;

use Piggy\Api\Enum\ContactAttributeDataTypes;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Contacts\ContactAttributeMapper;
use Piggy\Api\Mappers\Contacts\ContactAttributesMapper;
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


        $response = $this->client->get($this->resourceUri);

        $mapper = new ContactAttributesMapper();

        return $mapper->map((array)$response->getData());
    }

    /**
     * @param string $name
     * @param string $label
     * @param string $type
     * @param null|string $description
     * @param array|null $options
     * @return Attribute
     * @throws PiggyRequestException
     */
    public function create(string $name, string $label, string $type, ?string $description = "", ?array $options = null): Attribute

        {
        // Check type exists
        if (!ContactAttributeDataTypes::has($type)) {
            throw new \Exception("type {$type} invalid");
        }

        $contactAttributes = [
            "name" => $name,
            "label" => $label,
            "data_type" => $type // todo check if 'data_type' is okay
        ];

        if ($description != "") {
            $contactAttributes['description'] = $description;
        }

        if ($options != null) {
            $contactAttributes['options'] = $options;
        }

        $response = $this->client->post($this->resourceUri, $contactAttributes);

        $mapper = new ContactAttributeMapper();

        return $mapper->map($response->getData());
    }
}