<?php

namespace Piggy\Api\Tests\OAuth\Loyalty\Program;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Tests\OAuthTestCase;

/**
 * Class LoyaltyProgramResourceTest
 * @package Piggy\Api\Tests\OAuth\Loyalty\Program
 */
class LoyaltyProgramResourceTest extends OAuthTestCase
{
    /**
     * @test
     * @return void
     * @throws PiggyRequestException
     */
    public function it_returns_all_rewards()
    {
        $this->addExpectedResponse([
            "id" => 123,
            "name" => "Peter",
            "max_amount" => 54321,
            "custom_credit_name" => "Henk",
        ]);

        $loyaltyProgram = $this->mockedClient->loyaltyProgram->get();

        $this->assertEquals(123, $loyaltyProgram->getId());
        $this->assertEquals("Peter", $loyaltyProgram->getName());
        $this->assertEquals(54321, $loyaltyProgram->getMaxAmount());
        $this->assertEquals("Henk", $loyaltyProgram->getCustomCreditName());
    }
}
