<?php

namespace Piggy\Api\Tests\OAuth\Vouchers;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Tests\OAuthTestCase;

/**
 * Class GiftcardTransactionsResourceTest
 * @package Piggy\Api\Tests\OAuth\Vouchers
 */
class PromotionsResourceTest extends OAuthTestCase
{
    /**
     * @test
     * @throws PiggyRequestException
     */

    /**
     * @test
     * @throws PiggyRequestException
     */
    public function it_returns_promotion_after_creation()
    {
        $this->addExpectedResponse( [
            "uuid" => "1234-abcd-5678-efgh",
            "name" => "Free Pizza",
            "description" => "Get your free pizza slice!",

        ]);

        $promotion = $this->mockedClient->promotion->create("1234-abcd-5678-efgh", "Free Pizza", "Get your free pizza slice!");

        $this->assertEquals("1234-abcd-5678-efgh", $promotion->getUuid());
        $this->assertEquals("Free Pizza", $promotion->getName());
        $this->assertEquals("Get your free pizza slice!", $promotion->getDescription());
    }

    /**
     * @test
     * @throws PiggyRequestException
     */
    public function it_returns_a_list_of_promotions()
    {
        $this->addExpectedResponse([
                [
                    "uuid" => "1234-abcd-5678-efgh",
                    "name" => "Free Pizza",
                    "description" => "Get your free pizza slice!",
                    "voucher_limit" => 0,
                    "limit_per_contact" => null,
                    "expiration_duration" => null,
                ],
                [
                    "uuid" => "9876-ijkl-5432-mnop",
                    "name" => "Extra mozzarella",
                    "description" => "Get an extra layer of cheese on your pizza!",
                    "voucher_limit" => 0,
                    "limit_per_contact" => null,
                    "expiration_duration" => null,
                ]
            ]
        );

        $promotions = $this->mockedClient->promotion->list();

        $this->assertEquals("1234-abcd-5678-efgh", $promotions[0]->getUuid());
        $this->assertEquals("Free Pizza", $promotions[0]->getName());
        $this->assertEquals("Get your free pizza slice!", $promotions[0]->getDescription());
        $this->assertEquals(0, $promotions[0]->getVoucherLimit());

        $this->assertEquals("9876-ijkl-5432-mnop", $promotions[1]->getUuid());
        $this->assertEquals("Extra mozzarella", $promotions[1]->getName());
        $this->assertEquals("Get an extra layer of cheese on your pizza!", $promotions[1]->getDescription());
        $this->assertEquals(0, $promotions[1]->getVoucherLimit());
    }
}

