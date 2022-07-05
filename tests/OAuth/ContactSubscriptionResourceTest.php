<?php

namespace Piggy\Api\Tests\OAuth;

use Piggy\Api\Models\Contacts\SubscriptionType;
use Piggy\Api\Tests\OAuthTestCase;

/**
 * Class ContactSubscriptionResourceTest
 * @package Piggy\Api\Tests\OAuth
 */
class ContactSubscriptionResourceTest extends OAuthTestCase
{
    /**
     * @test
     */
    public function it_returns_a_list_of_subscription_types_of_an_account()
    {
        $this->addExpectedResponse([
            [
                "is_subscribed" => true,
                "subscription_type" => [
                    "uuid" => '123-122',
                    "name" => "Marketing",
                    "description" => "Marketing emails for orders and updates",
                    "active" => false,
                    "strategy" => "OPT_OUT"
                ],
                "status" => 0
            ],
            [
                "is_subscribed" => false,
                "subscription_type" => [
                    "uuid" => '123-123',
                    "name" => "Functional",
                    "description" => "Functional emails for orders and updates",
                    "active" => false,
                    "strategy" => "OPT_OUT"
                ],
                "status" => 1
            ],
        ]);

        $data = $this->mockedClient->contactSubscriptions->list("1");

        $this->assertEquals(true, $data[0]->isSubscribed());
        $this->assertEquals(false, $data[1]->isSubscribed());
        $this->assertEquals(0, $data[0]->getStatus());
        $this->assertEquals(1, $data[1]->getStatus());
        $this->assertEquals(new SubscriptionType(
            '123-122',
            'Marketing',
            'Marketing emails for orders and updates',
            false,
            'OPT_OUT'
        ), $data[0]->getSubscriptionType());
        $this->assertEquals(new SubscriptionType(
            '123-123',
            "Functional",
            "Functional emails for orders and updates",
            false,
            "OPT_OUT"
        ), $data[1]->getSubscriptionType());
    }

    /**
     * @test
     */
    public function it_subscribes_contact_to_subscription_type()
    {
        $this->addExpectedResponse([
            "is_subscribed" => true,
            "subscription_type" => [
                "uuid" => '123-321',
                "name" => "Marketing",
                "description" => "Marketing emails for orders and updates",
                "active" => true,
                "strategy" => "OPT_OUT"
            ],
            "status" => 0
        ]);

        $contactSubscription = $this->mockedClient->contactSubscriptions->subscribe("1", "1");

        $this->assertEquals(true, $contactSubscription->isSubscribed());
        $this->assertEquals(0, $contactSubscription->getStatus());
        $this->assertEquals(new SubscriptionType(
            '123-321',
            'Marketing',
            'Marketing emails for orders and updates',
            true,
            'OPT_OUT'
        ), $contactSubscription->getSubscriptionType());
    }

    /**
     * @test
     */
    public function it_unsubscribes_contact_to_subscription_type()
    {
        $this->addExpectedResponse([
            "is_subscribed" => false,
            "subscription_type" => [
                "uuid" => '123-321',
                "name" => "Marketing",
                "description" => "Marketing emails for orders and updates",
                "active" => true,
                "strategy" => "OPT_OUT"
            ],
            "status" => 0
        ]);

        $contactSubscription = $this->mockedClient->contactSubscriptions->unsubscribe("1", "1");

        $this->assertEquals(false, $contactSubscription->isSubscribed());
        $this->assertEquals(0, $contactSubscription->getStatus());
        $this->assertEquals(new SubscriptionType(
            '123-321',
            'Marketing',
            'Marketing emails for orders and updates',
            true,
            'OPT_OUT'
        ), $contactSubscription->getSubscriptionType());
    }
}
