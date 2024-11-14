<?php

namespace Piggy\Api\Tests\OAuth\Giftcards;

use Piggy\Api\Enum\GiftcardType;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Tests\OAuthTestCase;

class GiftcardsResourceTest extends OAuthTestCase
{
    /**
     * @test
     *
     * @throws GuzzleException
     * @throws PiggyRequestException
     * @throws MaintenanceModeException
     */
    public function it_gets_a_giftcard()
    {
        $this->addExpectedResponse([
            'uuid' => '00a8878d-5d51-405f-a0c0-34e1863785f1',
            'hash' => 'FOOBAR',
            'amount_in_cents' => 321,
            'type' => 'DIGITAL',
            'active' => true,
            'upgradeable' => false,
            'expiration_date' => '2130-06-13T12:09:00+00:00',
            'giftcard_program' => [
                'name' => 'My Giftcards',
                'active' => 'true',
                'uuid' => 'ea7c5a55-1df5-45cc-868e-343947b6b3b4',
            ],
        ]);

        $giftcard = $this->mockedClient->giftcards->get('00a8878d-5d51-405f-a0c0-34e1863785f1');

        $this->assertEquals('00a8878d-5d51-405f-a0c0-34e1863785f1', $giftcard->getUuid());
        $this->assertEquals('FOOBAR', $giftcard->getHash());
        $this->assertEquals(321, $giftcard->getAmountInCents());
        $this->assertEquals('DIGITAL', GiftcardType::byValue($giftcard->getType())->getName());
        $this->assertEquals(true, $giftcard->isActive());
        $this->assertEquals(false, $giftcard->isUpgradeable());
        $this->assertEquals('ea7c5a55-1df5-45cc-868e-343947b6b3b4', $giftcard->getGiftcardProgram()->getUuid());
        $this->assertEquals('My Giftcards', $giftcard->getGiftcardProgram()->getName());
    }

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

        $giftcard = $this->mockedClient->giftcards->get('123-123');

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
