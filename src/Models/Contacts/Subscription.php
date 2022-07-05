<?php

namespace Piggy\Api\Models\Contacts;

/**
 * Class Subscription
 * @package Piggy\Api\Models
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

}
