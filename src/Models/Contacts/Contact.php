<?php

namespace Piggy\Api\Models\Contacts;

use Piggy\Api\Models\Loyalty\CreditBalance;
use Piggy\Api\Models\Prepaid\PrepaidBalance;

/**
 * Class Contact
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
    protected $attributes;

    /**
     * @var array|null
     */
    protected $currentValues;

    /**
     * @var string
     */
    const resourceUri = '/api/v3/oauth/clients/contacts';

    public function __construct($uuid, ?string $email, ?PrepaidBalance $prepaidBalance, ?CreditBalance $creditBalance, ?array $attributes, ?array $subscriptions, ?array $currentValues = null)
    {
        $this->uuid = $uuid;
        $this->email = $email;
        $this->prepaidBalance = $prepaidBalance;
        $this->creditBalance = $creditBalance;
        $this->subscriptions = $subscriptions ?? [];
        $this->attributes = $attributes;
        $this->currentValues = $currentValues;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @param  string  $uuid
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getPrepaidBalance(): ?PrepaidBalance
    {
        return $this->prepaidBalance;
    }

    public function getCreditBalance(): ?CreditBalance
    {
        return $this->creditBalance;
    }

    public function setCreditBalance(?CreditBalance $creditBalance): void
    {
        $this->creditBalance = $creditBalance;
    }

    public function getAttributes(): ?array
    {
        return $this->attributes;
    }

    public function getSubscriptions(): array
    {
        return $this->subscriptions;
    }

    public function getCurrentValues(): ?array
    {
        return $this->currentValues;
    }
}
