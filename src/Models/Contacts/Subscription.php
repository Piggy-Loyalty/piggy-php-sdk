<?php

namespace Piggy\Api\Models\Contacts;

use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\ApiClient;
use Piggy\Api\Exceptions\MaintenanceModeException;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\StaticMappers\Contacts\SubscriptionMapper;
use Piggy\Api\StaticMappers\Contacts\SubscriptionsMapper;

/**
 * Class Subscription
 * @package Piggy\Api\Models\Contacts
 */
class Subscription
{
    /**
     * @var SubscriptionType
     */
    protected $subscriptionType;

    /**
     * @var bool
     */
    protected $isSubscribed;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var string
     */
    protected static $resourceUri = "/api/v3/oauth/clients/contact-subscriptions";

    /**
     * @param SubscriptionType $subscriptionType
     * @param bool $isSubscribed
     * @param string $status
     */
    public function __construct(SubscriptionType $subscriptionType, bool $isSubscribed, string $status)
    {
        $this->subscriptionType = $subscriptionType;
        $this->isSubscribed = $isSubscribed;
        $this->status = $status;
    }

    /**
     * @return SubscriptionType
     */
    public function getSubscriptionType(): SubscriptionType
    {
        return $this->subscriptionType;
    }

    /**
     * @param SubscriptionType $subscriptionType
     */
    public function setSubscriptionType(SubscriptionType $subscriptionType): void
    {
        $this->subscriptionType = $subscriptionType;
    }

    /**
     * @return bool
     */
    public function isSubscribed(): bool
    {
        return $this->isSubscribed;
    }

    /**
     * @param bool $isSubscribed
     */
    public function setIsSubscribed(bool $isSubscribed): void
    {
        $this->isSubscribed = $isSubscribed;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return void
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @param string $contactUuid
     * @param array $params
     * @return array
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function list(string $contactUuid, array $params = []): array
    {
        $response = ApiClient::get(self::$resourceUri . "/$contactUuid", $params);

        return SubscriptionsMapper::map($response->getData());
    }

    /**
     * @param string $contactUuid
     * @param array $body
     * @return Subscription
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function subscribe(string $contactUuid, array $body): Subscription
    {
        $response = ApiClient::put(self::$resourceUri . "/$contactUuid/subscribe", $body);

        return SubscriptionMapper::map($response->getData());
    }

    /**
     * @param string $contactUuid
     * @param array $body
     * @return Subscription
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function unsubscribe(string $contactUuid, array $body): Subscription
    {
        $response = ApiClient::put(self::$resourceUri . "/$contactUuid/unsubscribe", $body);

        return SubscriptionMapper::map($response->getData());
    }
}
