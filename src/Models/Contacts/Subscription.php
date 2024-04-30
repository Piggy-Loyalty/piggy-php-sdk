<?php

namespace Piggy\Api\Models\Contacts;

/**
 * Class Subscription
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
    const resourceUri = '/api/v3/oauth/clients/contact-subscriptions';

    public function __construct(SubscriptionType $subscriptionType, bool $isSubscribed, string $status)
    {
        $this->subscriptionType = $subscriptionType;
        $this->isSubscribed = $isSubscribed;
        $this->status = $status;
    }

    public function getSubscriptionType(): SubscriptionType
    {
        return $this->subscriptionType;
    }

    public function setSubscriptionType(SubscriptionType $subscriptionType): void
    {
        $this->subscriptionType = $subscriptionType;
    }

    public function isSubscribed(): bool
    {
        return $this->isSubscribed;
    }

    public function setIsSubscribed(bool $isSubscribed): void
    {
        $this->isSubscribed = $isSubscribed;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }
}
