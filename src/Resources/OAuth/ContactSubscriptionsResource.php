<?php

namespace Piggy\Api\Resources\OAuth;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Contacts\SubscriptionMapper;
use Piggy\Api\Mappers\Contacts\SubscriptionsMapper;
use Piggy\Api\Models\Contacts\Subscription;
use Piggy\Api\Resources\BaseResource;

/**
 * Class ContactSubscriptionsResource
 * @package Piggy\Api\Resources\OAuth
 * @deprecated
 */
class ContactSubscriptionsResource extends BaseResource
{
    /**
     * @var string
     */
    protected $resourceUri = "/api/v3/oauth/clients/contact-subscriptions";

    /**
     * @param string $contactUuid
     *
     * @return array
     * @throws PiggyRequestException
     */
    public function list(string $contactUuid): array
    {
        $response = $this->client->get("$this->resourceUri/$contactUuid", [
            "contact_uuid" => $contactUuid
        ]);

        $mapper = new SubscriptionsMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param string $contactUuid
     * @param string $subscriptionTypeUuid
     *
     * @return Subscription
     * @throws PiggyRequestException
     */
    public function subscribe(string $contactUuid, string $subscriptionTypeUuid): Subscription
    {
        $response = $this->client->put("$this->resourceUri/$contactUuid/subscribe", [
            "subscription_type_uuid" => $subscriptionTypeUuid
        ]);

        $mapper = new SubscriptionMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param string $contactUuid
     * @param string $subscriptionTypeUuid
     *
     * @return Subscription
     * @throws PiggyRequestException
     */
    public function unsubscribe(string $contactUuid, string $subscriptionTypeUuid): Subscription
    {
        $response = $this->client->put("$this->resourceUri/$contactUuid/unsubscribe", [
            "subscription_type_uuid" => $subscriptionTypeUuid
        ]);

        $mapper = new SubscriptionMapper();

        return $mapper->map($response->getData());
    }
}
