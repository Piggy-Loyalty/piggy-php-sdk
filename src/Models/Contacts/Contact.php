<?php

namespace Piggy\Api\Models\Contacts;

use Piggy\Api\Models\Loyalty\CreditBalance;
use Piggy\Api\Models\Prepaid\PrepaidBalance;

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
    protected $contactAttributes;

    /**
     * @var array|null
     */
    protected $currentValues;

    public function __construct($uuid, ?string $email, ?PrepaidBalance $prepaidBalance, ?CreditBalance $creditBalance, ?array $contactAttributes, ?array $subscriptions, ?array $currentValues = null)
    {
        $this->uuid = $uuid;
        $this->email = $email;
        $this->prepaidBalance = $prepaidBalance;
        $this->creditBalance = $creditBalance;
        $this->subscriptions = $subscriptions ?? [];
        $this->contactAttributes = $contactAttributes;
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
    public function setUuid(string $uuid): void
    {
        $this->uuid = $uuid;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
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
    public function getContactAttributes(): ?array
    {
        return $this->contactAttributes;
    }

    /**
     * @param array|null $contactAttributes
     * @return void
     */
    public function setContactAttributes(?array $contactAttributes): void
    {
        $this->contactAttributes = $contactAttributes;
    }

    /**
     * @return array
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
     * @return array|null
     */
    public function getCurrentValues(): ?array
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
