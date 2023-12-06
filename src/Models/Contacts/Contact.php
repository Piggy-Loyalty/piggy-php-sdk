<?php

namespace Piggy\Api\Models\Contacts;

use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\ApiClient;
use Piggy\Api\Exceptions\MaintenanceModeException;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Models\Loyalty\CreditBalance;
use Piggy\Api\Models\Prepaid\PrepaidBalance;
use Piggy\Api\Models\Tiers\Tier;
use Piggy\Api\StaticMappers\Contacts\ContactMapper;
use Piggy\Api\StaticMappers\Contacts\ContactsMapper;
use Piggy\Api\StaticMappers\Loyalty\CreditBalanceMapper;
use Piggy\Api\StaticMappers\Prepaid\PrepaidBalanceMapper;
use Piggy\Api\StaticMappers\Tiers\TierMapper;
use stdClass;

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

    /**
     * @var string
     */
    protected static $resourceUri = "/api/v3/oauth/clients/contacts";

    /**
     * @param $uuid
     * @param string|null $email
     * @param PrepaidBalance|null $prepaidBalance
     * @param CreditBalance|null $creditBalance
     * @param array|null $attributes
     * @param array|null $subscriptions
     * @param array|null $currentValues
     */
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
    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
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
     * @return array|null
     */
    public function getAttributes(): ?array
    {
        return $this->attributes;
    }

    /**
     * @return array
     */
    public function getSubscriptions(): array
    {
        return $this->subscriptions;
    }

    /**
     * @return array|null
     */
    public function getCurrentValues(): ?array
    {
        return $this->currentValues;
    }

    /**
     * @param string $contactUuid
     * @param array $params
     * @return Contact
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function get(string $contactUuid, array $params = []): Contact
    {
        $response = ApiClient::get(self::$resourceUri . "/$contactUuid", $params);

        return ContactMapper::map($response->getData());
    }

    /**
     * @param array $params
     * @return Contact
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function findOrCreate(array $params): Contact
    {
        $response = ApiClient::get(self::$resourceUri . "/find-or-create", $params);

        return ContactMapper::map($response->getData());
    }

    /**
     * @param array $params
     * @return Contact
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function findOneBy(array $params): Contact
    {
        $response = ApiClient::get(self::$resourceUri . "/find-one-by", $params);

        return ContactMapper::map($response->getData());
    }

    /**
     * @param array $params
     * @return array
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function list(array $params = []): array
    {
        $response = ApiClient::get(self::$resourceUri, $params);

        return ContactsMapper::map($response->getData());
    }

    /**
     * @param array $params
     * @return stdClass
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function findOrCreateAsync(array $params): stdClass
    {
        $response = ApiClient::get(self::$resourceUri . "/find-or-create/async", $params);

        return $response->getData();
    }

    /**
     * @param array $body
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function create(array $body): stdClass
    {
        $response = ApiClient::post(self::$resourceUri, $body);

        return $response->getData();
    }

    /**
     * @param array $body
     * @return stdClass
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function createAnonymously(array $body = []): stdClass
    {
        $response = ApiClient::post(self::$resourceUri . "/anonymous", $body);

        return $response->getData();
    }

    /**
     * @param string $contactUuid
     * @param array $body
     * @return Contact
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function update(string $contactUuid, array $body): Contact
    {
        $response = ApiClient::put(self::$resourceUri . "/$contactUuid", $body);

        return ContactMapper::map($response->getData());
    }

    /**
     * @param array $body
     * @return stdClass
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function createAsync(array $body): stdClass
    {
        $response = ApiClient::post(self::$resourceUri . "/async", $body);

        return $response->getData();
    }

    /**
     * @param string $contactUuid
     * @param array $body
     * @return mixed
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function delete(string $contactUuid, array $body = []): stdClass
    {
        return ApiClient::post(self::$resourceUri . "/$contactUuid/delete", $body);
    }

    /**
     * @param string $contactUuid
     * @param array $body
     * @return mixed
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function claimAnonymousContact(string $contactUuid, array $body = []): Contact
    {
        $response = ApiClient::put(self::$resourceUri . "/$contactUuid/claim", $body);

        return ContactMapper::map($response->getData());
    }
}