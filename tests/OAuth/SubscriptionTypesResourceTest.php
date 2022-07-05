<?php

namespace Piggy\Api\Tests\OAuth;

use Piggy\Api\Tests\OAuthTestCase;

/**
 * Class SubscriptionTypesResourceTest
 * @package Piggy\Api\Tests\OAuth
 */
class SubscriptionTypesResourceTest extends OAuthTestCase
{
    /**
     * @test
     */
    public function it_returns_a_list_of_subscription_types_of_an_account()
    {
        $this->addExpectedResponse([
            [
                "uuid" => '123-122',
                "name" => "Functional",
                "description" => "Functional emails for orders and updates",
                "active" => true,
                "strategy" => "OPT_OUT"
            ],
            [
                "uuid" => '123-123',
                "name" => "Marketing",
                "description" => "Marketing emails for orders and updates",
                "active" => false,
                "strategy" => "OPT_OUT"
            ]
        ]);

        $subscriptionTypes = $this->mockedClient->subscriptionTypes->list();

        $this->assertEquals("123-122", $subscriptionTypes[0]->getUuid());
        $this->assertEquals("123-123", $subscriptionTypes[1]->getUuid());
        $this->assertEquals("Functional", $subscriptionTypes[0]->getName());
        $this->assertEquals("Marketing", $subscriptionTypes[1]->getName());
        $this->assertEquals("Functional emails for orders and updates", $subscriptionTypes[0]->getDescription());
        $this->assertEquals("Marketing emails for orders and updates", $subscriptionTypes[1]->getDescription());
        $this->assertEquals(true, $subscriptionTypes[0]->isActive());
        $this->assertEquals(false, $subscriptionTypes[1]->isActive());
        $this->assertEquals("OPT_OUT", $subscriptionTypes[0]->getStrategy());
        $this->assertEquals("OPT_OUT", $subscriptionTypes[1]->getStrategy());
    }
}
