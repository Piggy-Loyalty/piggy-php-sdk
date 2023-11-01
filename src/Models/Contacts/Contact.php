<?php

namespace Piggy\Api\Models\Contacts;

use InvalidArgumentException;
use Piggy\Api\Environment;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Contacts\ContactMapper;
use Piggy\Api\Mappers\Contacts\ContactsMapper;
use Piggy\Api\Mappers\Loyalty\CreditBalanceMapper;
use Piggy\Api\Mappers\Prepaid\PrepaidBalanceMapper;
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

//    protected static $staticResourceUri = "/api/v3/oauth/clients/contacts";

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
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @param string $uuid
     */
    public function setUuid(string $uuid): void
    {
        $this->uuid = $uuid;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return PrepaidBalance
     */
    public function getPrepaidBalance(): ?PrepaidBalance
    {
        return $this->prepaidBalance;
    }

    /**
     * @return CreditBalance
     */
    public function getCreditBalance(): ?CreditBalance
    {
        return $this->creditBalance;
    }

    /**
     * @param CreditBalance|null $creditBalance
     */
    public function setCreditBalance(?CreditBalance $creditBalance): void
    {
        $this->creditBalance = $creditBalance;
    }

    /**
     * @param PrepaidBalance|null $prepaidBalance
     */
    public function setPrepaidBalance(?PrepaidBalance $prepaidBalance): void
    {
        $this->prepaidBalance = $prepaidBalance;
    }

    /**
     * @return array|null
     */
    public function getAttributes(): ?array
    {
        return $this->attributes;
    }

    /**
     * @param array|null $attributes
     * @return void
     */
    public function setAttributes(?array $attributes): void
    {
        $this->attributes = $attributes;
    }

    /**
     * @return array
     */
    public function getSubscriptions(): array
    {
        return $this->subscriptions;
    }

    /**
     * @param array $subscriptions
     */
    public function setSubscriptions(array $subscriptions): void
    {
        $this->subscriptions = $subscriptions;
    }

    /**
     * @return array|null
     */
    public function getCurrentValues(): ?array
    {
        return $this->currentValues;
    }

    /**
     * @param array $currentValues
     */
    public function setCurrentValues(array $currentValues): void
    {
        $this->currentValues = $currentValues;
    }

    protected static $staticResourceUri = "/api/v3/oauth/clients/contacts";


    /**
     * @param array $params
     * @return Contact
     * @throws PiggyRequestException
     */
    public static function get(array $params): Contact
    {
//        $response = Environment::get(self::$staticResourceUri . "/$contactUuid");
//
//        $mapper = new self::$mapper();t
//
//        return $mapper->map($response->getData());


        $endpoint = self::$staticResourceUri . "/" . implode('/', array_values($params));

        $response = Environment::get($endpoint);

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

    public static function findOneBy(string $email): Contact
    {
        $response = Environment::get(self::$staticResourceUri . "/find-one-by", [
            "email" => $email
        ]);

        $mapper = new self::$mapper();

        return $mapper->map($response->getData());
    }

    public static function create(string $email): Contact
    {
        $response = Environment::post(self::$staticResourceUri, [
            "email" => $email
        ]);

        $mapper = new self::$mapper();

        return $mapper->map($response->getData());
    }


    public static function list(?int $page = 1, ?int $limit = 30): array
    {
        $response = Environment::get(self::$staticResourceUri, [
            "page" => $page,
            "limit" => $limit
        ]);

        $mapper = new ContactsMapper();

        return $mapper->map($response->getData());
    }

    public static function createAnonymously(?string $contactIdentifierValue = null): Contact
    {
        $response = Environment::post( self::$staticResourceUri. "/anonymous", [
            "contact_identifier_value" => $contactIdentifierValue,
        ]);

        $mapper = new self::$mapper();;

        return $mapper->map($response->getData());
    }

    public static function update(string $contactUuid, array $contactAttributes): Contact
    {
        $response = Environment::put( self::$staticResourceUri. "/$contactUuid", [
            'attributes' => $contactAttributes
        ]);

        $mapper = new self::$mapper();;

        return $mapper->map($response->getData());
    }

    public static function showPrepaidBalance($contactUuid): PrepaidBalance
    {
        $response = Environment::get( self::$staticResourceUri. "/$contactUuid/prepaid-balance");

        $mapper = new PrepaidBalanceMapper();

        return $mapper->map($response->getData());
    }

    public static function showCreditBalance($contactUuid): CreditBalance
    {
        $response = Environment::get( self::$staticResourceUri. "/$contactUuid/credit-balance");

        $mapper = new CreditBalanceMapper();

        return $mapper->map($response->getData());
    }

    public static function createAsync($email): Contact
    {
        $response = Environment::post( self::$staticResourceUri. "/async", [
            "email" => $email
        ]);

        $mapper = new self::$mapper();;

        return $mapper->map($response->getData());
    }

    public static function findOrCreateAsync($email): Contact
    {
        $response = Environment::get( self::$staticResourceUri. "/find-or-create/async", [
            "email" => $email
        ]);

        $mapper = new self::$mapper();;

        return $mapper->map($response->getData());
    }

    public static function destroy(string $contactUuid, string $type)
    {
        $response = Environment::post( self::$staticResourceUri. "/$contactUuid/delete", [
            "type" => $type
        ]);

        return $response->getData();
    }

    public static function claimAnonymousContact(string $contactUuid, string $email)
    {
        $response = Environment::put( self::$staticResourceUri. "/$contactUuid/claim", [
            "email" => $email
        ]);

        $mapper = new self::$mapper();;

        return $mapper->map($response->getData());
    }



}