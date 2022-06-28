<?php

namespace Piggy\Api\Resources\OAuth;

use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\ContactIdentifiers\ContactIdentifierMapper;
use Piggy\Api\Models\Contacts\ContactIdentifier;
use Piggy\Api\Resources\BaseResource;

/**
 * Class ContactIdentifiersResource
 * @package Piggy\Api\Resources\OAuth
 */
class ContactIdentifiersResource extends BaseResource
{
    /**
     * @var string
     */
    protected $resourceUri = "/api/v3/oauth/clients/contact-identifiers";

    /**
     * @param string $contactIdentifierValue
     * @return ContactIdentifier
     * @throws GuzzleException
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
     * @param string $contactUuid
     * @param string|null $contactIdentifierName
     * @return ContactIdentifier
     * @throws GuzzleException
     * @throws PiggyRequestException
     */
    public function create(string $contactIdentifierValue, string $contactUuid, ?string $contactIdentifierName = null): ContactIdentifier
    {
        $response = $this->client->post($this->resourceUri, [
            "contact_uuid" => $contactUuid,
            "contact_identifier_value" => $contactIdentifierValue,
            "contact_identifier_name" => $contactIdentifierName,
        ]);

        $mapper = new ContactIdentifierMapper();

        return $mapper->map($response->getData());
    }
}
