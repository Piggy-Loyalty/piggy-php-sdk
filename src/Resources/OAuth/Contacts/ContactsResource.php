<?php

namespace Piggy\Api\Resources\OAuth\Contacts;

use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Contacts\ContactMapper;
use Piggy\Api\Mappers\Contacts\ContactsMapper;
use Piggy\Api\Mappers\Loyalty\CreditBalanceMapper;
use Piggy\Api\Mappers\Prepaid\PrepaidBalanceMapper;
use Piggy\Api\Models\Contacts\Contact;
use Piggy\Api\Models\Loyalty\CreditBalance;
use Piggy\Api\Models\Prepaid\PrepaidBalance;
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
     * @param string $contactUuid
     * @return Contact
     * @throws GuzzleException
     * @throws PiggyRequestException
     */
    public function get(string $contactUuid): Contact
    {
        $response = $this->client->get("$this->resourceUri/$contactUuid");

        $mapper = new ContactMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param string $email
     * @return Contact
     * @throws GuzzleException
     * @throws PiggyRequestException
     */
    public function findOneBy(string $email): Contact
    {
        $response = $this->client->get("$this->resourceUri/find-one-by", [
            "email" => $email,
        ]);

        $mapper = new ContactMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param string $email
     * @return Contact
     * @throws GuzzleException
     * @throws PiggyRequestException
     */
    public function findOrCreate(string $email): Contact
    {
        $response = $this->client->get("$this->resourceUri/find-or-create", [
            "email" => $email,
        ]);

        $mapper = new ContactMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param string $email
     * @return Contact
     * @throws GuzzleException
     * @throws PiggyRequestException
     */
    public function create(string $email): Contact
    {
        $response = $this->client->post("$this->resourceUri", [
            "email" => $email,
        ]);

        $mapper = new ContactMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param string|null $contactIdentifierValue
     * @return Contact
     * @throws GuzzleException
     * @throws PiggyRequestException
     */
    public function createAnonymously(?string $contactIdentifierValue = null): Contact
    {
        $response = $this->client->post("$this->resourceUri/anonymous", [
            "contact_identifier_value" => $contactIdentifierValue,
        ]);

        $mapper = new ContactMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param int|null $page
     * @param int|null $limit
     * @return array
     * @throws GuzzleException
     * @throws PiggyRequestException
     */
    public function list(?int $page = null, ?int $limit = null): array
    {
        $response = $this->client->get("$this->resourceUri", [
            "page" => $page,
            "limit" => $limit
        ]);

        $mapper = new ContactsMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param string $contactUuid
     * @param array $attributes
     * @return Contact
     * @throws GuzzleException
     * @throws PiggyRequestException
     */
    public function update(string $contactUuid, array $attributes): Contact
    {
        $response = $this->client->put("$this->resourceUri/$contactUuid", [
            'attributes' => $attributes
        ]);

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
        $response = $this->client->get("$this->resourceUri/$contactUuid/prepaid-balance");

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
        $response = $this->client->get("$this->resourceUri/$contactUuid/credit-balance");

        $mapper = new CreditBalanceMapper();

        return $mapper->map($response->getData());
    }
}
