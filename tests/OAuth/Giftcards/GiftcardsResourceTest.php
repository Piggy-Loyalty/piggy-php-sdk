<?php

namespace Piggy\Api\Tests\OAuth\Giftcards;

use Piggy\Api\Enum\GiftcardType;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Tests\OAuthTestCase;

/**
 * Class GiftcardsResourceTest
 */
class GiftcardsResourceTest extends OAuthTestCase
{
    /**
     * @test
     *
     * @throws PiggyRequestException
     */
    public function it_finds_a_giftcard_by_hash()
    {
        $this->addExpectedResponse([
            'uuid' => '123-123',
            'hash' => 'GJ2P725oe',
            'amount_in_cents' => 321,
            'type' => 'PHYSICAL',
            'active' => true,
            'upgradeable' => true,
            'expiration_date' => '2130-06-13T12:09:00+00:00',
            'giftcard_program' => [
                'name' => 'My Giftcards',
                'active' => 'true',
                'uuid' => '32-32-lol',
            ],
        ]);

        $giftcard = $this->mockedClient->giftcards->findOneBy('GJ2P725oe');

        $this->assertEquals('123-123', $giftcard->getUuid());
        $this->assertEquals('GJ2P725oe', $giftcard->getHash());
        $this->assertEquals(321, $giftcard->getAmountInCents());
        $this->assertEquals('PHYSICAL', GiftcardType::byValue($giftcard->getType())->getName());
        $this->assertEquals(true, $giftcard->isActive());
        $this->assertEquals(true, $giftcard->isUpgradeable());
        $this->assertEquals('32-32-lol', $giftcard->getGiftcardProgram()->getUuid());
        $this->assertEquals('My Giftcards', $giftcard->getGiftcardProgram()->getName());
    }

    /**
     * @test
     *
     * @throws PiggyRequestException
     */
    public function it_returns_giftcard_after_creation()
    {
        $this->addExpectedResponse([
            'uuid' => '123-123',
            'hash' => 'GJ2P725oe',
            'amount_in_cents' => 321,
            'type' => 'PHYSICAL',
            'active' => true,
            'upgradeable' => true,
            'expiration_date' => '2130-06-13T12:09:00+00:00',
            'giftcard_program' => [
                'name' => 'My Giftcards',
                'active' => 'true',
                'uuid' => '32-32-lol',
            ],
        ]);

        $giftcard = $this->mockedClient->giftcards->create('32-32-lol', 2123123);

        $this->assertEquals('123-123', $giftcard->getUuid());
        $this->assertEquals('GJ2P725oe', $giftcard->getHash());
        $this->assertEquals(321, $giftcard->getAmountInCents());
        $this->assertEquals('PHYSICAL', GiftcardType::byValue($giftcard->getType())->getName());
        $this->assertEquals(true, $giftcard->isActive());
        $this->assertEquals(true, $giftcard->isUpgradeable());
        $this->assertEquals('32-32-lol', $giftcard->getGiftcardProgram()->getUuid());
        $this->assertEquals('My Giftcards', $giftcard->getGiftcardProgram()->getName());
    }
}
