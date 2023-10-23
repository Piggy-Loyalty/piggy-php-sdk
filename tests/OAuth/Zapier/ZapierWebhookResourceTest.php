<?php

namespace Piggy\Api\Tests\OAuth\Zapier;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Tests\OAuthTestCase;

/**
 * Class webhookSubscriptionsResourceTest
 * @package Piggy\Api\Tests\OAuth\Giftcards
 */
class ZapierWebhookResourceTest extends OAuthTestCase
{
    /**
     * @test
     * @throws PiggyRequestException
     */
    public function it_creates_a_zapier_webhook()
    {
        $this->addExpectedResponse(
            [
                "id" => 10,
                "type" => "contactCreated",
                "url" => "http://192.123.123.123:3000/piggy/floepsie32",
            ]
        );

        $zapierWebhook = $this->mockedClient->zapierWebhook->create('contactCreated', 'http://192.123.123.123:3000/piggy/floepsie32');

        $this->assertEquals(10, $zapierWebhook->getId());
        $this->assertEquals("contactCreated", $zapierWebhook->getType());
        $this->assertEquals("http://192.123.123.123:3000/piggy/floepsie32", $zapierWebhook->getUrl());
    }
}
