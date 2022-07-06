<?php

namespace Piggy\Api\Tests\OAuth\Units;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Tests\OAuthTestCase;

class UnitsResourceTest extends OAuthTestCase
{
    /**
     * @test
     * @throws PiggyRequestException
     */
    public function it_returns_a_list_with_units()
    {
        $this->addExpectedResponse([
            [
                "name" => "calorien",
                "label" => "kcal",
                "is_default" => true
            ],
            [
                "name" => 'euros',
                "label" => 'ekkers',
                "is_default" => false,
            ]
        ]);

        $units = $this->mockedClient->units->list();

        $this->assertEquals("calorien", $units[0]->getName());
        $this->assertEquals("kcal", $units[0]->getLabel());
        $this->assertEquals(true, $units[0]->getIsDefault());
        $this->assertEquals("euros", $units[1]->getName());
        $this->assertEquals("ekkers", $units[1]->getLabel());
        $this->assertEquals(false, $units[1]->getIsDefault());

    }

    /**
     * @test
     * @throws PiggyRequestException
     */
    public function it_returns_a_unit()
    {
        $this->addExpectedResponse([
            "name" => "Bonkers",
            "label" => "bonkers",
            "is_default" => true
        ]);

        $unit = $this->mockedClient->units->create('Bonkers', "bonkers", true);

        $this->assertEquals("Bonkers", $unit->getName());
        $this->assertEquals("bonkers", $unit->getLabel());
        $this->assertEquals(true, $unit->getIsDefault());
    }
}
