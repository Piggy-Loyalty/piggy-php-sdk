<?php

namespace Piggy\Api\Resources\OAuth\ContactAttributes;

use Piggy\Api\Enum\CustomAttributeDataTypes;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\ContactAttributes\ContactAttributeMapper;
use Piggy\Api\Mappers\ContactAttributes\ContactAttributesMapper;
use Piggy\Api\Models\ContactAttributes\ContactAttribute;
use Piggy\Api\Models\ContactAttributes\Options;
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
     * @param int $page
     * @param int $limit
     * @return array
     * @throws PiggyRequestException
     */
    public function list(int $page = 2, int $limit = 30): array
    {
        $response = $this->client->get($this->resourceUri, [
            "page" => $page,
            "limit" => $limit,
        ]);

        $mapper = new ContactAttributesMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param string $label
     * @param string $name
     * @param string $dataType
     * @param string | null $description
     * @param array | null $options
     * @return void
     * @throws PiggyRequestException
     */
    public function create(string $label, string $name, string $dataType, ?string $description, ?array $options): ContactAttribute
    {
        // Check datatype exists
        if (!CustomAttributeDataTypes::has($dataType)) {
            throw new \Exception("DataType {$dataType} invalid");
        }

        $contactAttributes = [
            "name" => $name,
            "label" => $label,
            "data_type" => $dataType
        ];

        if ($description != null) {
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