<?php

namespace Piggy\Api\Models\Contacts;

use Piggy\Api\Environment;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Contacts\ContactMapper;
use Piggy\Api\Models\Loyalty\CreditBalance;
use Piggy\Api\Models\Prepaid\PrepaidBalance;

/**
 * Class Contact
 * @package Piggy\Api\Models\Contacts
 */
class Contact
{
    /**
     * @var string
     */
    protected $uuid;

    /**
     * @var string|null
     */
    protected $email;

    /**
     * @var PrepaidBalance|null
     */
    protected $prepaidBalance;

    /**
     * @var CreditBalance|null
     */
    protected $creditBalance;

    /**
     * @var array
     */
    protected $subscriptions;

    /**
     * @var array|null
     */
    protected $attributes;

    /**
     * @var array|null
     */
    protected $currentValues;

    protected static $staticResourceUri = "/api/v3/oauth/clients/contacts";

    protected static $mapper = ContactMapper::class;

    public function __construct($uuid, ?string $email, ?PrepaidBalance $prepaidBalance, ?CreditBalance $creditBalance, ?array $attributes, ?array $subscriptions, ?array $currentValues = null)
    {
        $this->uuid = $uuid;
        $this->email = $email;
        $this->prepaidBalance = $prepaidBalance;
        $this->creditBalance = $creditBalance;
        $this->subscriptions = $subscriptions ?? [];
        $this->attributes = $attributes;
        $this->currentValues = $currentValues;
    }

    /**
     * @param string $contactUuid
     * @return Contact
     * @throws PiggyRequestException
     */
    public static function get(string $contactUuid): Contact
    {
        $response = Environment::get(self::$staticResourceUri . "/$contactUuid");

        $mapper = new self::$mapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param string $email
     * @return Contact
     * @throws PiggyRequestException
     */
    public static function findOrCreate(string $email): Contact
    {
        $response = Environment::get(self::$staticResourceUri . "/find-or-create", [
            "email" => $email
        ]);

        $mapper = new self::$mapper();

        return $mapper->map($response->getData());
    }

//    public function findOneBy(string $email): Contact
//    {
//        $response = $this->client->get("$this->resourceUri/find-one-by", [
//            "email" => $email,
//        ]);
//
//        $mapper = new ContactMapper();
//
//        return $mapper->map($response->getData());
//    }
//
//    public function create(string $email): Contact
//    {
//        $response = $this->client->post("$this->resourceUri", [
//            "email" => $email,
//        ]);
//
//        $mapper = new ContactMapper();
//
//        return $mapper->map($response->getData());
//    }
//
//    public function list(?int $page = 1, ?int $limit = 30): array
//    {
//        $response = $this->client->get("$this->resourceUri", [
//            "page" => $page,
//            "limit" => $limit
//        ]);
//
//        $mapper = new ContactsMapper();
//
//        return $mapper->map($response->getData());
//    }
//
//    public function createAnonymously(?string $contactIdentifierValue = null): Contact
//    {
//        $response = $this->client->post("$this->resourceUri/anonymous", [
//            "contact_identifier_value" => $contactIdentifierValue,
//        ]);
//
//        $mapper = new ContactMapper();
//
//        return $mapper->map($response->getData());
//    }
//
//    public function update(string $contactUuid, array $contactAttributes): Contact
//    {
//        $response = $this->client->put("$this->resourceUri/$contactUuid", [
//            'attributes' => $contactAttributes
//        ]);
//
//        $mapper = new ContactMapper();
//
//        return $mapper->map($response->getData());
//    }
//
//    public function getPrepaidBalance($contactUuid): PrepaidBalance
//    {
//        $response = $this->client->get("$this->resourceUri/$contactUuid/prepaid-balance");
//
//        $mapper = new PrepaidBalanceMapper();
//
//        return $mapper->map($response->getData());
//    }
//
//    public function getCreditBalance($contactUuid): CreditBalance
//    {
//        $response = $this->client->get("$this->resourceUri/$contactUuid/credit-balance");
//
//        $mapper = new CreditBalanceMapper();
//
//        return $mapper->map($response->getData());
//    }
//
//    public function createAsync($email): Contact
//    {
//        $response = $this->client->post("$this->resourceUri/async", [
//            "email" => $email
//        ]);
//
//        $mapper = new ContactMapper();
//
//        return $mapper->map($response->getData());
//    }
//
//    public function findOrCreateAsync($email): Contact
//    {
//        $response = $this->client->get("$this->resourceUri/find-or-create/async", [
//            "email" => $email
//        ]);
//
//        $mapper = new ContactMapper();
//
//        return $mapper->map($response->getData());
//    }
//
//    public function destroy(string $contactUuid, string $type)
//    {
//        $response = $this->client->post("$this->resourceUri/$contactUuid/delete", [
//            "type" => $type
//        ]);
//
//        return $response->getData();
//    }
//
//    public function claimAnonymousContact(string $contactUuid, string $email)
//    {
//        $response = $this->client->put("$this->resourceUri/$contactUuid/claim", [
//            "email" => $email
//        ]);
//
//        $mapper = new ContactMapper();
//
//        return $mapper->map($response->getData());
//    }



}