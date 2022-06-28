<?php

namespace Piggy\Api\Resources\OAuth;

use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\ContactIdentifiers\ContactIdentifierMapper;
use Piggy\Api\Mappers\Contacts\SubscriptionMapper;
use Piggy\Api\Mappers\Contacts\SubscriptionsMapper;
use Piggy\Api\Models\Contacts\ContactIdentifier;
use Piggy\Api\Models\Contacts\Subscription;
use Piggy\Api\Resources\BaseResource;

/**
 * Class ContactSubscriptionsResource
 * @package Piggy\Api\Resources\OAuth
 */
class ContactSubscriptionsResource extends BaseResource
{
    /**
     * @var string
     */
    protected $resourceUri = "api/v3/oauth/clients/contact-subscriptions";


    /**
     * @param $contactUuid
     * @return array
     * @throws GuzzleException
     * @throws PiggyRequestException
     */
    public function list($contactUuid): array
    {
        $response = $this->client->get("$this->resourceUri/$contactUuid", [
            "contact_uuid" => $contactUuid
        ]);

        $mapper = new SubscriptionsMapper();

        return $mapper->map($response->getData());
    }


    public function subscribe($contactUuid, $subscriptionTypeUuid): Subscription
    {
        $response = $this->client->get("{$this->resourceUri}/{$contactUuid}/subscribe", [
            "contact_uuid" => $contactUuid,
            "subscription_type_uuid" => $subscriptionTypeUuid
        ]);

        $mapper = new SubscriptionMapper();

        return $mapper->map($response->getData());
    }


    public function unsubscribe($contactUuid, $subscriptionTypeUuid): Subscription
    {
        $response = $this->client->get("{$this->resourceUri}/{$contactUuid}/unsubscribe", [
            "contact_uuid" => $contactUuid,
            "subscription_type_uuid" => $subscriptionTypeUuid
        ]);

        $mapper = new SubscriptionMapper();

        return $mapper->map($response->getData());
    }
}
