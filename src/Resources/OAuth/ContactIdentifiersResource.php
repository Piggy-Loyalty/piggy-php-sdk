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
    protected $resourceUri = "api/v3/oauth/clients/contact-identifiers";

    /**
     * @param $contactIdentifierValue
     * @return ContactIdentifier
     * @throws GuzzleException
     * @throws PiggyRequestException
     */
    public function get($contactIdentifierValue): ContactIdentifier
    {
        $response = $this->client->get("{$this->resourceUri}/find", [
            "contact_identifier_value" => $contactIdentifierValue
        ]);

        $mapper = new ContactIdentifierMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param $contactIdentifierValue
     * @param $contactUuid
     * @param $contactIdentifierName
     *
     * @return ContactIdentifier
     * @throws GuzzleException
     * @throws PiggyRequestException
     */
    public function create($contactIdentifierValue, $contactUuid, $contactIdentifierName): ContactIdentifier
    {
        $response = $this->client->post($this->resourceUri, [
            "uuid" => $contactUuid,
            "contact_identifier_value" => $contactIdentifierValue,
            "contact_identifier_name" => $contactIdentifierName
        ]);

        $mapper = new ContactIdentifierMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param $contactIdentifierValue
     *
     * @return ContactIdentifier
     * @throws GuzzleException
     * @throws PiggyRequestException
     */
    public function createAnonymously($contactIdentifierValue): ContactIdentifier
    {
        $response = $this->client->post("{$this->resourceUri}/anonymous", [
            "contact_identifier_value" => $contactIdentifierValue,
        ]);

        $mapper = new ContactIdentifierMapper();

        return $mapper->map($response->getData());
    }
}
