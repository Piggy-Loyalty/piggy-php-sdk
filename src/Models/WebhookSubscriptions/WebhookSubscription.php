<?php

namespace Piggy\Api\Models\WebhookSubscriptions;

use DateTime;

/**
 * Class WebhookSubscription
 * @package Piggy\Api\Models
 */
class WebhookSubscription
{
    protected $uuid;
    protected $name;
    protected $event_type;
    protected $url;
    protected $properties;
    protected $status;
    protected $version;

    /**
     * @var DateTime
     */
    protected $created_at;

    public function __construct(
        string   $uuid,
        string   $name,
        string   $eventType,
        string   $url,
        array    $properties,
        string  $status,
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

    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEventType()
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

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->created_at;
    }
}
