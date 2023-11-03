<?php

namespace Piggy\Api\Models\WebhookSubscriptions;

use DateTime;
use Piggy\Api\Environment;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\WebhookSubscriptions\WebhookSubscriptionMapper;
use Piggy\Api\Mappers\WebhookSubscriptions\WebhookSubscriptionsMapper;

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
    protected static $resourceUri = "/api/v3/oauth/clients/webhook-subscriptions";

    /**
     * @var string
     */
    protected static $mapper = WebhookSubscriptionMapper::class;

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
    public function getEventType()
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
     * @param array $body
     * @return mixed
     * @throws PiggyRequestException
     */
    public static function update(string $webhookUuid, array $body)
    {
        $response = Environment::put(self::$resourceUri . "/{$webhookUuid}", $body);

        $mapper = new self::$mapper();

        return $mapper->map($response->getData());
    }

    /**
     * @throws PiggyRequestException
     */
    public static function list(array $params = []): array
    {
        $response = Environment::get(self::$resourceUri, $params);

        $mapper = new WebhookSubscriptionsMapper();

        return $mapper->map((array)$response->getData());
    }

    /**
     * @param array $body
     * @return WebhookSubscription
     * @throws PiggyRequestException
     */
    public static function create(array $body): WebhookSubscription
    {
        $response = Environment::post(self::$resourceUri, $body);

        $mapper = new self::$mapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param string $webhookUuid
     * @param array $params
     * @return WebhookSubscription
     * @throws PiggyRequestException
     */
    public static function get(string $webhookUuid, array $params = []): WebhookSubscription
    {
        $response = Environment::get(self::$resourceUri . "/$webhookUuid", $params);

        $mapper = new self::$mapper();

        return $mapper->map($response->getData());
    }


    /**
     * @param string $webhookUuid
     * @param array $body
     * @return string
     * @throws PiggyRequestException
     */
    public static function destroy(string $webhookUuid, array $body = []): string
    {
        Environment::destroy(self::$resourceUri . "/$webhookUuid", $body);

        return 'Webhook deleted';
    }
}
