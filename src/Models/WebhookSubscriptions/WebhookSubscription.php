<?php

namespace Piggy\Api\Models\WebhookSubscriptions;

use DateTime;
use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\Exceptions\MaintenanceModeException;
use Piggy\Api\ApiClient;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\StaticMappers\WebhookSubscriptions\WebhookSubscriptionMapper;
use Piggy\Api\StaticMappers\WebhookSubscriptions\WebhookSubscriptionsMapper;

/**
 * Class WebhookSubscription
 * @package Piggy\Api\Models
 */
class WebhookSubscription
{
    /**
     * @var string
     */
    protected $uuid;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $event_type;
    /**
     * @var string
     */
    protected $url;
    /**
     * @var array
     */
    protected $properties;
    /**
     * @var string
     */
    protected $status;
    /**
     * @var string
     */
    protected $version;

    /**
     * @var DateTime
     */
    protected $created_at;

    /**
     * @var string
     */
    const resourceUri = "/api/v3/oauth/clients/webhook-subscriptions";

    /**
     * @param string $uuid
     * @param string $name
     * @param string $eventType
     * @param string $url
     * @param array $properties
     * @param string $status
     * @param string $version
     * @param DateTime $createdAt
     */
    public function __construct(
        string   $uuid,
        string   $name,
        string   $eventType,
        string   $url,
        array    $properties,
        string   $status,
        string   $version,
        DateTime $createdAt
    )
    {
        $this->uuid = $uuid;
        $this->name = $name;
        $this->event_type = $eventType;
        $this->url = $url;
        $this->properties = $properties;
        $this->status = $status;
        $this->version = $version;
        $this->created_at = $createdAt;
    }

    /**
     * @return string|null
     */
    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getEventType(): string
    {
        return $this->event_type;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return array|null
     */
    public function getProperties(): ?array
    {
        return $this->properties;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->created_at;
    }

    /**
     * @param string $webhookUuid
     * @param array $params
     * @return mixed
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function update(string $webhookUuid, array $params): WebhookSubscription
    {
        $response = ApiClient::put(self::resourceUri . "/{$webhookUuid}", $params);

        return WebhookSubscriptionMapper::map($response->getData());
    }

    /**
     * @param array $params
     * @return array
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function list(array $params = []): array
    {
        $response = ApiClient::get(self::resourceUri, $params);

        return WebhookSubscriptionsMapper::map((array)$response->getData());
    }

    /**
     * @param array $body
     * @return WebhookSubscription
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function create(array $body): WebhookSubscription
    {
        $response = ApiClient::post(self::resourceUri, $body);

        return WebhookSubscriptionMapper::map($response->getData());
    }

    /**
     * @param string $webhookUuid
     * @param array $params
     * @return WebhookSubscription
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function get(string $webhookUuid, array $params = []): WebhookSubscription
    {
        $response = ApiClient::get(self::resourceUri . "/$webhookUuid", $params);

        return WebhookSubscriptionMapper::map($response->getData());
    }

    /**
     * @param string $webhookUuid
     * @param array $params
     * @return string
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function delete(string $webhookUuid, array $params = []): string
    {
        ApiClient::delete(self::resourceUri . "/$webhookUuid", $params);

        return 'Webhook deleted';
    }
}
