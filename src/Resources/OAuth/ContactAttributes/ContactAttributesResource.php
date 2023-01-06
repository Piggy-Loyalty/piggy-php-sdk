<?php

namespace Piggy\Api\Resources\OAuth\ContactAttributes;

use Piggy\Api\Enum\ContactAttributeDataTypes;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\ContactAttributes\ContactAttributeMapper;
use Piggy\Api\Mappers\ContactAttributes\ContactAttributesMapper;
use Piggy\Api\Models\ContactAttributes\ContactAttribute;
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
     * @param string $dataType
     * @param null|string $description
     * @param array|null $options
     * @return ContactAttribute
     * @throws PiggyRequestException
     */
    public function create(string $name, string $label, string $dataType, ?string $description = "", ?array $options = null): ContactAttribute

        {
        // Check datatype exists
        if (!ContactAttributeDataTypes::has($dataType)) {
            throw new \Exception("DataType {$dataType} invalid");
        }

        $contactAttributes = [
            "name" => $name,
            "label" => $label,
            "data_type" => $dataType
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