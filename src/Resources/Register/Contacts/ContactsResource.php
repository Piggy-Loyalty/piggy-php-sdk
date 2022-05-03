<?php

namespace Piggy\Api\Resources\Register\Contacts;

use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Contacts\ContactMapper;
use Piggy\Api\Models\Contacts\Contact;
use Piggy\Api\Resources\BaseResource;

/**
 * Class ContactsResource
 * @package Piggy\Api\Resources\Register\Contacts
 */
class ContactsResource extends BaseResource
{
    /**
     * @var string
     */
    protected $resourceUri = "/api/v3/register/contacts";

    /**
     * @param string $contact_uuid
     *
     * @return Contact
     * @throws GuzzleException
     * @throws PiggyRequestException
     */
    public function get(string $contact_uuid): Contact
    {
        $response = $this->client->get("{$this->resourceUri}/{$contact_uuid}");

        $mapper = new ContactMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param string $email
     *
     * @return Contact
     * @throws GuzzleException
     * @throws PiggyRequestException
     */
    public function findOneBy(string $email): Contact
    {
        $response = $this->client->get("{$this->resourceUri}/find-one-by", [
            "email" => $email,
        ]);

        $mapper = new ContactMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param string $email
     *
     * @return Contact
     * @throws GuzzleException
     * @throws PiggyRequestException
     */
    public function findOrCreate(string $email): Contact
    {
        $response = $this->client->get("{$this->resourceUri}/find-or-create", [
            "email" => $email,
        ]);

        $mapper = new ContactMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param string $email
     *
     * @return Contact
     * @throws GuzzleException
     * @throws PiggyRequestException
     */
    public function create(string $email): Contact
    {
        $response = $this->client->post("{$this->resourceUri}", [
            "email" => $email,
        ]);

        $mapper = new ContactMapper();

        return $mapper->map($response->getData());
    }
}
