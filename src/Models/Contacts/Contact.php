<?php

namespace Piggy\Api\Models\Contacts;

use Piggy\Api\Models\Loyalty\CreditBalance;
use Piggy\Api\Models\Prepaid\PrepaidBalance;

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
     * @var ?Subscription[]
     */
    protected $subscriptions;

    /**
     * @var ContactAttribute[]|null
     */
    protected $attributes;

    /**
     * @var mixed[]|null
     */
    protected $currentValues;

    /**
     * @var string
     */
    const resourceUri = '/api/v3/oauth/clients/contacts';

    /**
     * @param  ContactAttribute[]|null  $attributes
     * @param  Subscription[]|null  $subscriptions
     * @param  mixed[]|null  $currentValues
     */
    public function __construct(string $uuid, ?string $email, ?PrepaidBalance $prepaidBalance, ?CreditBalance $creditBalance, ?array $attributes, ?array $subscriptions = null, ?array $currentValues = null)
    {
        $this->uuid = $uuid;
        $this->email = $email;
        $this->prepaidBalance = $prepaidBalance;
        $this->creditBalance = $creditBalance;
        $this->subscriptions = $subscriptions;
        $this->attributes = $attributes;
        $this->currentValues = $currentValues;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

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

    /**
     * @return ContactAttribute[]|null
     */
    public function getAttributes(): ?array
    {
        return $this->attributes;
    }

    /**
     * @return ?Subscription[]
     */
    public function getSubscriptions(): ?array
    {
        return $this->subscriptions;
    }

    /**
     * @return mixed[]|null
     */
    public function getCurrentValues(): ?array
    {
        return $this->currentValues;
    }
}
