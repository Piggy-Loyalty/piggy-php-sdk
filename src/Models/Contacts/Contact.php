<?php

namespace Piggy\Api\Models\Contacts;

use Piggy\Api\Models\Loyalty\CreditBalance;

/**
 * Class Contact
 * @package Piggy\Api\Models
 */
class Contact
{
    /**
     * @var string
     */
    protected $uuid;

    /**
     * @var string
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
     * @var array
     */
    protected $currentValues;

    public function __construct($uuid, ?string $email, ?PrepaidBalance $prepaidBalance, ?CreditBalance $creditBalance, ?array $attributes, ?array $subscriptions, ?array $currentValues)
    {
        $this->uuid = $uuid;
        $this->email = $email;
        $this->prepaidBalance = $prepaidBalance;
        $this->creditBalance = $creditBalance;
        $this->subscriptions = $subscriptions;
        $this->attributes = $attributes;
        $this->currentValues = $currentValues;
    }

    /**
     * @return string
     */
    public function getUuId(): string
    {
        return $this->uuid;
    }

    /**
     * @param string $uuid
     */
    public function setUuId(string $uuid): void
    {
        $this->uuid = $uuid;
    }

    /**
     * @return string
     */
    public function getEmail(): string
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
     */
    public function setAttributes(?array $attributes): void
    {
        $this->attributes = $attributes;
    }

    /**
     * @return array|null
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
     * @return array
     */
    public function getCurrentValues(): array
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

}
