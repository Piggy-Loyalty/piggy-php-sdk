<?php

namespace Piggy\Api\Models\Contacts;

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

    protected static $staticResourceUri = "/api/v3/oauth/clients/contacts";

    /**
     * @var string
     */
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

    /**
     * @param string $contactUuid
     * @param array $params
     * @return Contact
     * @throws PiggyRequestException
     */
    public static function get(string $contactUuid, array $params = []): Contact
    {
        $response = Environment::get(self::$staticResourceUri . '/' . $contactUuid, $params);

        $mapper = new self::$mapper;

        return $mapper->map($response->getData());
    }

    /**
     * @param array $params
     * @return Contact
     * @throws PiggyRequestException
     */
    public static function findOrCreate(array $params): Contact
    {
        $response = Environment::get(self::$staticResourceUri . "/find-or-create", $params);

        $mapper = new self::$mapper;

        return $mapper->map($response->getData());
    }

    /**
     * @param array $params
     * @return Contact
     * @throws PiggyRequestException
     */
    public static function findOneBy(array $params): Contact
    {
        $response = Environment::get(self::$staticResourceUri . "/find-one-by", $params);

        $mapper = new self::$mapper;

        return $mapper->map($response->getData());
    }


    /**
     * @throws PiggyRequestException
     */
    public static function list(array $params = []): array
    {
        $response = Environment::get(self::$staticResourceUri, $params);

        $mapper = new ContactsMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param string $contactUuid
     * @param array $params
     * @return PrepaidBalance
     * @throws PiggyRequestException
     */
    public static function showPrepaidBalance(string $contactUuid, array $params = []): PrepaidBalance
    {
        $response = Environment::get(self::$staticResourceUri . "/" . $contactUuid . '/prepaid-balance');

        $mapper = new PrepaidBalanceMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param string $contactUuid
     * @param array $params
     * @return CreditBalance
     * @throws PiggyRequestException
     */
    public static function showCreditBalance(string $contactUuid, array $params = []): CreditBalance
    {
        $response = Environment::get(self::$staticResourceUri . "/" . $contactUuid . '/credit-balance', $params);

        $mapper = new CreditBalanceMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param array $params
     * @return Contact
     * @throws PiggyRequestException
     */
    public static function findOrCreateAsync(array $params): Contact
    {
        $response = Environment::get(self::$staticResourceUri . "/find-or-create/async", $params);

        $mapper = new self::$mapper;

        return $mapper->map($response->getData());
    }

    /**
     * @param array $body
     * @return Contact
     * @throws PiggyRequestException
     */
    public static function create(array $body): Contact
    {
        $response = Environment::post(self::$staticResourceUri, $body);

        $mapper = new self::$mapper;

        return $mapper->map($response->getData());
    }

    /**
     * @param array $body
     * @return Contact
     * @throws PiggyRequestException
     */
    public static function createAnonymously(array $body = []): Contact
    {
        $response = Environment::post(self::$staticResourceUri . "/anonymous", $body);

        $mapper = new self::$mapper;

        return $mapper->map($response->getData());
    }

    /**
     * @param string $contactUuid
     * @param array $body
     * @return Contact
     * @throws PiggyRequestException
     */
    public static function update(string $contactUuid, array $body): Contact
    {
        $response = Environment::put(self::$staticResourceUri . "/" . $contactUuid, $body);

        $mapper = new self::$mapper;

        return $mapper->map($response->getData());
    }

    /**
     * @param array $body
     * @return Contact
     * @throws PiggyRequestException
     */
    public static function createAsync(array $body): Contact
    {
        $response = Environment::post(self::$staticResourceUri . "/async", $body);

        $mapper = new self::$mapper;

        return $mapper->map($response->getData());
    }


    /**
     * @param string $contactUuid
     * @param array
     * @return mixed
     * @throws PiggyRequestException
     */
    public static function destroy(string $contactUuid, array $body = [])
    {
        $response = Environment::post(self::$staticResourceUri . "/" . $contactUuid . '/delete', $body);

        return $response->getData();
    }

    /**
     * @param string $contactUuid
     * @param array
     * @return mixed
     * @throws PiggyRequestException
     */
    public static function claimAnonymousContact(string $contactUuid, array $body = [])
    {
        $response = Environment::put(self::$staticResourceUri . "/" . $contactUuid . '/claim', $body);

        $mapper = new self::$mapper;

        return $mapper->map($response->getData());
    }


}