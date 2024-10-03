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
                'uuid' => '123123',
                'name' => 'My Giftcard Program Test',
                'active' => true,
                'max_amount_in_cents' => 10000,
                'calculator_flow' => 'default',
                'expiration_days' => 365,
            ],
            [
                'uuid' => '321321',
                'name' => 'My Old Giftcard Program Test',
                'active' => false,
                'max_amount_in_cents' => 5000,
                'calculator_flow' => 'overlay',
                'expiration_days' => 180,
            ],
        ]);

        $giftcardPrograms = $this->mockedClient->giftcardProgram->list();

        $this->assertEquals('123123', $giftcardPrograms[0]->getUuid());
        $this->assertEquals('My Giftcard Program Test', $giftcardPrograms[0]->getName());
        $this->assertEquals(true, $giftcardPrograms[0]->isActive());
        $this->assertEquals(10000, $giftcardPrograms[0]->getMaxAmountInCents());
        $this->assertEquals('default', $giftcardPrograms[0]->getCalculatorFlow());
        $this->assertEquals(365, $giftcardPrograms[0]->getExpirationDays());

        $this->assertEquals('321321', $giftcardPrograms[1]->getUuid());
        $this->assertEquals('My Old Giftcard Program Test', $giftcardPrograms[1]->getName());
        $this->assertEquals(false, $giftcardPrograms[1]->isActive());
        $this->assertEquals(5000, $giftcardPrograms[1]->getMaxAmountInCents());
        $this->assertEquals('overlay', $giftcardPrograms[1]->getCalculatorFlow());
        $this->assertEquals(180, $giftcardPrograms[1]->getExpirationDays());
    }
}
