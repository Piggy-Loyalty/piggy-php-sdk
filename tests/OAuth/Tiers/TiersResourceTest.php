<?php

namespace Piggy\Api\Tests\OAuth\Tiers;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Tests\OAuthTestCase;

class TiersResourceTest extends OAuthTestCase
{
    /**
     * @test
     * @throws PiggyRequestException
     */
    public function it_returns_a_list_with_tiers()
    {
        $this->addExpectedResponse([
            [
                "name" => "someTier",
                "description" => "someDescription",
                "position" => 1,
                "media" => null,
                "uuid" => "ea77edd4-5a5e-4a6e-aeda-55038c43c839"
            ],
            [
                "name" => "someSecondTier",
                "description" => "someSecondDescription",
                "position" => 2,
                "media" => null,
                "uuid" => "123456789-abcdefg"
            ],
        ]);

        $tier = $this->mockedClient->tier->list();

        $this->assertEquals("ea77edd4-5a5e-4a6e-aeda-55038c43c839", $tier[0]->getUuid());
        $this->assertEquals("someTier", $tier[0]->getName());
        $this->assertEquals("someDescription", $tier[0]->getDescription());
        $this->assertEquals(1, $tier[0]->getPosition());
        $this->assertEquals(null, $tier[0]->getMedia());

        $this->assertEquals("123456789-abcdefg", $tier[1]->getUuid());
        $this->assertEquals("someSecondTier", $tier[1]->getName());
        $this->assertEquals("someSecondDescription", $tier[1]->getDescription());
        $this->assertEquals(2, $tier[1]->getPosition());
        $this->assertEquals(null, $tier[1]->getMedia());

    }
}