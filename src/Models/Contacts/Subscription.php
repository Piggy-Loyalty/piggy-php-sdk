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
     * @var boolean
     */
    protected $isSubscribed;

    /**
     * @var int
     */
    protected $status;

    public function __construct($subscriptionType, $isSubscribed, $status)
    {
        $this->subscriptionType = $subscriptionType;
        $this->isSubscribed = $isSubscribed;
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    /**
     * @return Attribute
     */
    public function getAttribute(): Attribute
    {
        return $this->attribute;
    }

    /**
     * @param Attribute $attribute
     */
    public function setAttribute(Attribute $attribute): void
    {
        $this->attribute = $attribute;
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
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

}
