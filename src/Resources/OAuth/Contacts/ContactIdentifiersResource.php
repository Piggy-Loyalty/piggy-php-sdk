<?php

namespace Piggy\Api\Resources\OAuth\Contacts;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\ContactIdentifiers\ContactIdentifierMapper;
use Piggy\Api\Models\Contacts\ContactIdentifier;
use Piggy\Api\Resources\BaseResource;

/**
 * Class ContactIdentifiersResource
 * @package Piggy\Api\Resources\OAuth\Contacts
 */
class ContactIdentifiersResource extends BaseResource
{
    /**
     * @var string
     */
    protected $resourceUri = "/api/v3/oauth/clients/contact-identifiers";

    /**
     * @param string $contactIdentifierValue
     *
     * @return ContactIdentifier
     * @throws PiggyRequestException
     */
    public function get(string $contactIdentifierValue): ContactIdentifier
    {
        $response = $this->client->get("$this->resourceUri/find", [
            "contact_identifier_value" => $contactIdentifierValue
        ]);

        $mapper = new ContactIdentifierMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param string $contactIdentifierValue
     * @param string|null $contactUuid
     * @param string|null $contactIdentifierName
     * @return ContactIdentifier
     * @throws PiggyRequestException
     */
    public function create(string $contactIdentifierValue, ?string $contactUuid = null, ?string $contactIdentifierName = ''): ContactIdentifier
    {
        $data = [
            "contact_identifier_value" => $contactIdentifierValue,
        ];

        if ($contactUuid != null) {
            $data['contact_uuid'] = $contactUuid;
        }

        if ($contactIdentifierName != null) {
            $data['contact_identifier_name'] = $contactIdentifierName;
        }

        $response = $this->client->post($this->resourceUri, $data);
        $mapper = new ContactIdentifierMapper();

        return $mapper->map($response->getData());
    }

    public function link(string $contactIdentifierValue, string $contactUuid): ContactIdentifier
    {
        $response = $this->client->put("$this->resourceUri/link", [
            "contact_identifier_value" => $contactIdentifierValue,
            "contact_uuid" => $contactUuid,
        ]);

        $mapper = new ContactIdentifierMapper();

        return $mapper->map($response->getData());
    }
}
