<?php

namespace Piggy\Api\Resources\OAuth\Contacts;

use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Contacts\ContactMapper;
use Piggy\Api\Models\Contacts\Contact;
use Piggy\Api\Resources\BaseResource;

/**
 * Class ContactsResource
 * @package Piggy\Api\Resources\OAuth\Contacts
 */
class ContactsResource extends BaseResource
{
    /**
     * @var string
     */
    protected $resourceUri = "/api/v3/oauth/clients/contacts";

    /**
     * @return Contact
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Piggy\Api\Exceptions\PiggyRequestException
     */
    public function get(): Contact
    {
        $response = $this->client->get($this->resourceUri);

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
