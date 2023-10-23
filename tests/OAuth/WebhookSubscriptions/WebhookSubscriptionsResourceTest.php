<?php

namespace Piggy\Api\Tests\OAuth\WebhookSubscriptions;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Tests\OAuthTestCase;

/**
 * Class webhookSubscriptionsResourceTest
 * @package Piggy\Api\Tests\OAuth\Giftcards
 */
class WebhookSubscriptionsResourceTest extends OAuthTestCase
{
    /**
     * @test
     * @throws PiggyRequestException
     */
    public function it_creates_a_webhook_subscription()
    {
        $this->addExpectedResponse(
            [
                "uuid" => "865cf015-84ed-4058-bf79-17eb9eabd3d8",
                "name" => "someWebhookSubscription",
                "event_type" => "contact_created",
                "url" => "http://192.123.123.123:3000/piggy/floepsie2",
                "properties" => [],
                "status" => "ACTIVE",
                "version" => "V1",
                "created_at" => "2023-10-20T12:22:57+00:00",
            ]
        );

        $webhookSubscription = $this->mockedClient->webhookSubscriptions->create('someWebhookSubscription', 'http://192.168.100.151:3000/piggy/floepsie2', 'contact_created');

        $this->assertEquals("865cf015-84ed-4058-bf79-17eb9eabd3d8", $webhookSubscription->getUuid());
        $this->assertEquals("someWebhookSubscription", $webhookSubscription->getName());
        $this->assertEquals("contact_created", $webhookSubscription->getEventType());
        $this->assertEquals("http://192.123.123.123:3000/piggy/floepsie2", $webhookSubscription->getUrl());
        $this->assertEquals([], $webhookSubscription->getProperties());
        $this->assertEquals("ACTIVE", $webhookSubscription->getStatus());
        $this->assertEquals("V1", $webhookSubscription->getVersion());
        $this->assertEquals("2023-10-20T12:22:57+00:00", $webhookSubscription->getCreatedAt());
    }

    /**
     * @test
     * @throws PiggyRequestException
     */
    public function it_returns_a_list_of_webhook_subscriptions()
    {
        $this->addExpectedResponse(
            [
                [
                    "uuid" => "f1dc2d67-caa8-4919-a537-66491a94ed2f",
                    "name" => "123",
                    "event_type" => "contact_created",
                    "url" => "http://192.123.123.123:3000/piggy/test123",
                    "properties" => [],
                    "status" => "ACTIVE",
                    "version" => "V1",
                    "created_at" => "2023-10-20T11:46:22+00:00",
                ],
                [
                    "uuid" => "5062eeac-bbeb-4903-b81e-2422793ff151",
                    "name" => "someWebhookSubscription",
                    "event_type" => "contact_created",
                    "url" => "http://192.123.123.123:3000/piggy/floepsie",
                    "properties" => [],
                    "status" => "ACTIVE",
                    "version" => "V1",
                    "created_at" => "2023-10-20T11:48:43+00:00",
                ]
            ]
        );

        $webhookSubscriptions = $this->mockedClient->webhookSubscriptions->list();

        $this->assertEquals("f1dc2d67-caa8-4919-a537-66491a94ed2f", $webhookSubscriptions[0]->getUuid());
        $this->assertEquals("123", $webhookSubscriptions[0]->getName());
        $this->assertEquals("contact_created", $webhookSubscriptions[0]->getEventType());
        $this->assertEquals("http://192.123.123.123:3000/piggy/test123", $webhookSubscriptions[0]->getUrl());
        $this->assertEquals([], $webhookSubscriptions[0]->getProperties());
        $this->assertEquals("ACTIVE", $webhookSubscriptions[0]->getStatus());
        $this->assertEquals("V1", $webhookSubscriptions[0]->getVersion());
        $this->assertEquals("2023-10-20T11:46:22+00:00", $webhookSubscriptions[0]->getCreatedAt());

        $this->assertEquals("5062eeac-bbeb-4903-b81e-2422793ff151", $webhookSubscriptions[1]->getUuid());
        $this->assertEquals("someWebhookSubscription", $webhookSubscriptions[1]->getName());
        $this->assertEquals("contact_created", $webhookSubscriptions[1]->getEventType());
        $this->assertEquals("http://192.123.123.123:3000/piggy/floepsie", $webhookSubscriptions[1]->getUrl());
        $this->assertEquals([], $webhookSubscriptions[1]->getProperties());
        $this->assertEquals("ACTIVE", $webhookSubscriptions[1]->getStatus());
        $this->assertEquals("V1", $webhookSubscriptions[1]->getVersion());
        $this->assertEquals("2023-10-20T11:48:43+00:00", $webhookSubscriptions[1]->getCreatedAt());
    }

    /**
     * @test
     * @throws PiggyRequestException
     */
    public function it_shows_a_webhook_subscription()
    {
        $this->addExpectedResponse(
            [
                "uuid" => "865cf015-84ed-4058-bf79-17eb9eabd3d8",
                "name" => "someWebhookSubscription",
                "event_type" => "contact_created",
                "url" => "http://192.123.123.123:3000/piggy/floepsie2",
                "properties" => [],
                "status" => "ACTIVE",
                "version" => "V1",
                "created_at" => "2023-10-20T12:22:57+00:00",
            ]
        );

        $webhookSubscription = $this->mockedClient->webhookSubscriptions->get('c1cce063-3891-4ca7-83b9-fdbf58098e1f');

        $this->assertEquals("865cf015-84ed-4058-bf79-17eb9eabd3d8", $webhookSubscription->getUuid());
        $this->assertEquals("someWebhookSubscription", $webhookSubscription->getName());
        $this->assertEquals("contact_created", $webhookSubscription->getEventType());
        $this->assertEquals("http://192.123.123.123:3000/piggy/floepsie2", $webhookSubscription->getUrl());
        $this->assertEquals([], $webhookSubscription->getProperties());
        $this->assertEquals("ACTIVE", $webhookSubscription->getStatus());
        $this->assertEquals("V1", $webhookSubscription->getVersion());
        $this->assertEquals("2023-10-20T12:22:57+00:00", $webhookSubscription->getCreatedAt());
    }

    /**
     * @test
     * @throws PiggyRequestException
     */
    public function it_update_a_webhook_subscription()
    {
        $this->addExpectedResponse(
            [
                "uuid" => "29df6287-80b7-4ef5-a099-a96f6a38ba84",
                "name" => "someUpdatedName",
                "event_type" => "credit_reception_created",
                "url" => "http://192.168.100.151:3000/piggy/floepsieupdated",
                "properties" => [],
                "status" => "INACTIVE",
                "version" => "V1",
                "created_at" => "2023-10-20T13:29:10+00:00",
            ]
        );

        $webhookSubscription = $this->mockedClient->webhookSubscriptions->update('29df6287-80b7-4ef5-a099-a96f6a38ba84', 'someUpdatedName', 'http://192.168.100.151:3000/piggy/floepsieupdated', [], 'INACTIVE');

        $this->assertEquals("29df6287-80b7-4ef5-a099-a96f6a38ba84", $webhookSubscription->getUuid());
        $this->assertEquals("someUpdatedName", $webhookSubscription->getName());
        $this->assertEquals("credit_reception_created", $webhookSubscription->getEventType());
        $this->assertEquals("http://192.168.100.151:3000/piggy/floepsieupdated", $webhookSubscription->getUrl());
        $this->assertEquals([], $webhookSubscription->getProperties());
        $this->assertEquals("INACTIVE", $webhookSubscription->getStatus());
        $this->assertEquals("V1", $webhookSubscription->getVersion());
        $this->assertEquals("2023-10-20T13:29:10+00:00", $webhookSubscription->getCreatedAt());
    }

    /**
     * @test
     * @throws PiggyRequestException
     */
    public function it_update_a_webhook_subscription_with_properties_when_type_is_contact_updated()
    {
        $this->addExpectedResponse(
            [
                "uuid" => "c1cce063-3891-4ca7-83b9-fdbf58098e1f",
                "name" => "someUpdatedName",
                "event_type" => "contact_updated",
                "url" => "http://192.123.123.123:3000/piggy/floepsieupdated",
                "properties" => ["firstname", "lastname"],
                "status" => "INACTIVE",
                "version" => "V1",
                "created_at" => "2023-10-20T12:54:23+00:00",
            ]
        );

        $webhookSubscription = $this->mockedClient->webhookSubscriptions->update('29df6287-80b7-4ef5-a099-a96f6a38ba84', 'someUpdatedName', 'http://192.123.123.123:3000/piggy/floepsieupdated', [], 'INACTIVE');

        $this->assertEquals("c1cce063-3891-4ca7-83b9-fdbf58098e1f", $webhookSubscription->getUuid());
        $this->assertEquals("someUpdatedName", $webhookSubscription->getName());
        $this->assertEquals("contact_updated", $webhookSubscription->getEventType());
        $this->assertEquals("http://192.123.123.123:3000/piggy/floepsieupdated", $webhookSubscription->getUrl());
        $this->assertEquals(["firstname", "lastname"], $webhookSubscription->getProperties());
        $this->assertEquals("INACTIVE", $webhookSubscription->getStatus());
        $this->assertEquals("V1", $webhookSubscription->getVersion());
        $this->assertEquals("2023-10-20T12:54:23+00:00", $webhookSubscription->getCreatedAt());
    }

    /**
     * @test
     * @throws PiggyRequestException
     */
    public function it_can_delete_a_webhook()
    {
        $this->addExpectedResponse(
            [
                'Webhook deleted'
            ]
        );

        $responseMessage = $this->mockedClient->webhookSubscriptions->destroy('someWebhookSubscription');

        $this->assertEquals('Webhook deleted', $responseMessage);
    }
}
