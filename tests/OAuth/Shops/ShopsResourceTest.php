<?php

namespace Piggy\Api\Tests\OAuth\Shops;

use Piggy\Api\Tests\OAuthTestCase;

class ShopsResourceTest extends OAuthTestCase
{
    /**
     * @test
     */
    public function it_returns_a_list_with_shops()
    {
        $this->addExpectedResponse([
            [
                "uuid" => "123-123",
                "name" => "Toffe Shop",
                "reference" => null,
                "loyalty_program" => [
                    "id" => 12,
                    "name" => "Spaarprogramma"
                ]],
            [
                "uuid" => '123-shop',
                "name" => 'Shop Naam',
                "reference" => null,
                "loyalty_program" => [
                    "id" => 122,
                    "name" => "Spaarprogramma2"
                ]
            ]
        ]);

        $shop = $this->mockedClient->shops->all();

        $this->assertEquals("123-123", $shop[0]->getUuid());
        $this->assertEquals("Toffe Shop", $shop[0]->getName());
        $this->assertEquals(null, $shop[0]->getReference());
        $this->assertEquals(12, $shop[0]->getLoyaltyProgram()->getId());
        $this->assertEquals('Spaarprogramma', $shop[0]->getLoyaltyProgram()->getName());
        $this->assertEquals("123-shop", $shop[1]->getUuid());
        $this->assertEquals("Shop Naam", $shop[1]->getName());
        $this->assertEquals(null, $shop[1]->getReference());
        $this->assertEquals(122, $shop[1]->getLoyaltyProgram()->getId());
        $this->assertEquals('Spaarprogramma2', $shop[1]->getLoyaltyProgram()->getName());
    }

    /**
     * @test
     */
    public function it_returns_a_shop()
    {
        $this->addExpectedResponse([
            "uuid" => "123-123",
            "name" => "Toffe Shop",
            "reference" => null,
            "loyalty_program" => [
                "id" => 12,
                "name" => "Spaarprogramma"
            ]
        ]);

        $shop = $this->mockedClient->shops->get("123-123");

        $this->assertEquals("123-123", $shop->getUuid());
        $this->assertEquals("Toffe Shop", $shop->getName());
        $this->assertEquals(null, $shop->getReference());
        $this->assertEquals(12, $shop->getLoyaltyProgram()->getId());
        $this->assertEquals('Spaarprogramma', $shop->getLoyaltyProgram()->getName());
    }
}
