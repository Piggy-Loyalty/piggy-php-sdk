<?php

namespace Piggy\Api\Tests\OAuth;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Tests\OAuthTestCase;

class GiftcardProgramsResourceTest extends OAuthTestCase
{
    /** @test
     * @throws PiggyRequestException
     */
    public function it_returns_a_list_of_giftcard_programs()
    {
        $this->addExpectedResponse([
            [
                "name" => "My Giftcard Program Test",
                "active" => true,
                "uuid" => "123123"
            ],
            [
                "name" => "My Old Giftcard Program Test",
                "active" => false,
                "uuid" => "321321"
            ]
        ]);

        $giftcardPrograms = $this->mockedClient->giftcardProgram->list();

        $this->assertEquals('My Giftcard Program Test', $giftcardPrograms[0]->getName());
        $this->assertEquals(true, $giftcardPrograms[0]->isActive());
        $this->assertEquals("123123", $giftcardPrograms[0]->getUuid());

        $this->assertEquals('My Old Giftcard Program Test', $giftcardPrograms[1]->getName());
        $this->assertEquals(false, $giftcardPrograms[1]->isActive());
        $this->assertEquals("321321", $giftcardPrograms[1]->getUuid());
    }
}