<?php

namespace Piggy\Api\Resources\OAuth\Contacts;

use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Contacts\ContactMapper;
use Piggy\Api\Mappers\Contacts\ContactsMapper;
use Piggy\Api\Mappers\Contacts\PrepaidBalanceMapper;
use Piggy\Api\Mappers\Loyalty\CreditBalanceMapper;
use Piggy\Api\Models\Contacts\Contact;
use Piggy\Api\Models\Contacts\PrepaidBalance;
use Piggy\Api\Models\Loyalty\CreditBalance;
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
     * @param $contactUuid
     * @return Contact
     * @throws GuzzleException
     * @throws PiggyRequestException
     */
    public function get($contactUuid): Contact
    {
        $response = $this->client->get("{$this->resourceUri}/{$contactUuid}");

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

    /**
     * @param $page
     * @param $limit
     *
     * @return array
     * @throws GuzzleException
     * @throws PiggyRequestException
     */
    public function list($page = null, $limit = null): array
    {
        $response = $this->client->get("{$this->resourceUri}", [
            "page" => $page,
            "limit" => $limit
        ]);

        $mapper = new ContactsMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param string $contactUuid
     * @param array $attributes
     *
     * @return Contact
     * @throws GuzzleException
     * @throws PiggyRequestException
     */
    public function update(string $contactUuid, array $attributes): Contact
    {
        $response = $this->client->put("{$this->resourceUri}/{$contactUuid}", $attributes);

        $mapper = new ContactMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param $contactUuid
     * @return PrepaidBalance
     * @throws GuzzleException
     * @throws PiggyRequestException
     */
    public function getPrepaidBalance($contactUuid): PrepaidBalance
    {
        $response = $this->client->get("{$this->resourceUri}/{$contactUuid}/prepaid/balance");

        $mapper = new PrepaidBalanceMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param $contactUuid
     * @return CreditBalance
     * @throws GuzzleException
     * @throws PiggyRequestException
     */
    public function getCreditBalance($contactUuid): CreditBalance
    {
        $response = $this->client->get("{$this->resourceUri}/{$contactUuid}/credit-balance");

        $mapper = new CreditBalanceMapper();

        return $mapper->map($response->getData());
    }
}
