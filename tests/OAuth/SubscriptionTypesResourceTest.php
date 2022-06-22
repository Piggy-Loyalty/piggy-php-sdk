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
                "id" => 2,
                "name" => "Functional",
                "description" => "Functional emails for orders and updates",
                "active" => true,
                "strategy" => "OPT_OUT"
            ],
            [
                "id" => 3,
                "name" => "Marketing",
                "description" => "Marketing emails for orders and updates",
                "active" => false,
                "strategy" => "OPT_OUT"
            ]
        ]);

        $data = $this->mockedClient->subscriptionTypesResource->list();

        $this->assertEquals("2", $data[0]->getId());
        $this->assertEquals("3", $data[1]->getId());
        $this->assertEquals("Functional", $data[0]->getName());
        $this->assertEquals("Marketing", $data[1]->getName());
        $this->assertEquals("Functional emails for orders and updates", $data[0]->getDescription());
        $this->assertEquals("Marketing emails for orders and updates", $data[1]->getDescription());
        $this->assertEquals(true, $data[0]->isActive());
        $this->assertEquals(false, $data[1]->isActive());
        $this->assertEquals("OPT_OUT", $data[0]->getStrategy());
        $this->assertEquals("OPT_OUT", $data[1]->getStrategy());

    }
}
