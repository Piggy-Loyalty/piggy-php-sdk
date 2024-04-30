<?php

namespace Piggy\Api\Models\WebhookSubscriptions;

use DateTime;

/**
 * Class WebhookSubscription
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
    const resourceUri = '/api/v3/oauth/clients/webhook-subscriptions';

    public function __construct(
        string $uuid,
        string $name,
        string $eventType,
        string $url,
        array $properties,
        string $status,
        string $version,
        DateTime $createdAt
    ) {
        $this->uuid = $uuid;
        $this->name = $name;
        $this->event_type = $eventType;
        $this->url = $url;
        $this->properties = $properties;
        $this->status = $status;
        $this->version = $version;
        $this->created_at = $createdAt;
    }

    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEventType(): string
    {
        return $this->event_type;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getProperties(): ?array
    {
        return $this->properties;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->created_at;
    }
}
