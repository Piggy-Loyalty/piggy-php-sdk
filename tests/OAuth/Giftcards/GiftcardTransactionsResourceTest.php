<?php

namespace Piggy\Api\Tests\OAuth\Giftcards;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Tests\OAuthTestCase;

/**
 * Class GiftcardTransactionsResourceTest
 * @package Piggy\Api\Tests\OAuth\Giftcards
 */
class GiftcardTransactionsResourceTest extends OAuthTestCase
{
    /**
     * @test
     * @throws PiggyRequestException
     */
    public function it_finds_a_giftcard_transaction()
    {
        $this->addExpectedResponse(
            [
                "uuid" => '123-123',
                "amount_in_cents" => 180,
                "type" => "STANDARD",
                "settled" => false,
                "card_id" => 30215,
                "shop_id" => 15,
                "settlements" => [],
                "created_at" => "2022-06-30T13:29:16+00:00",
            ]
        );

        $giftcardTransaction = $this->mockedClient->giftcardTransactions->get('123-123');

        $this->assertEquals("123-123", $giftcardTransaction->getUuid());
        $this->assertEquals(180, $giftcardTransaction->getAmountInCents());
        $this->assertEquals("STANDARD", $giftcardTransaction->getType());

        $this->assertEquals(false, $giftcardTransaction->isSettled());
        $this->assertEquals(30215, $giftcardTransaction->getGiftcardId());

        $this->assertEquals(15, $giftcardTransaction->getShopId());

        $this->assertEquals([], $giftcardTransaction->getSettlements());
        $this->assertEquals("2022-06-30T13:29:16+00:00", $giftcardTransaction->getCreatedAt()->format('c'));
    }

    /**
     * @test
     * @throws PiggyRequestException
     */
    public function it_finds_a_giftcard_transaction_with_settlements()
    {
        $this->addExpectedResponse(
            [
                "uuid" => '123-123',
                "amount_in_cents" => 180,
                "created_at" => "2022-06-30T13:29:16+00:00",

            ]
        );

        $giftcardTransaction = $this->mockedClient->giftcardTransactions->get('123-123');

        $this->assertEquals("123-123", $giftcardTransaction->getUuid());
        $this->assertEquals(180, $giftcardTransaction->getAmountInCents());
        $this->assertEquals("2022-06-30T13:29:16+00:00", $giftcardTransaction->getCreatedAt()->format('c'));

    }

    /**
     * @test
     * @throws PiggyRequestException
     */
    public function it_returns_giftcard_transaction_after_creation()
    {
        $this->addExpectedResponse(
            [
                "uuid" => '123-123',
                "amount_in_cents" => 180,
                "created_at" => "2022-06-30T13:29:16+00:00",
            ]
        );

        $giftcardTransaction = $this->mockedClient->giftcardTransactions->create(1, 2, 100);

        $this->assertEquals("123-123", $giftcardTransaction->getUuid());
        $this->assertEquals(180, $giftcardTransaction->getAmountInCents());
        $this->assertEquals("2022-06-30T13:29:16+00:00", $giftcardTransaction->getCreatedAt()->format('c'));
    }

    /**
     * @test
     * @throws PiggyRequestException
     */
    public function it_corrects_a_giftcard_transaction()
    {
        $this->addExpectedResponse(
            [
                "uuid" => '123-123',
                "amount_in_cents" => 180,
                "created_at" => "2022-06-30T13:29:16+00:00",
            ]
        );

        $giftcardTransaction = $this->mockedClient->giftcardTransactions->correct('123-123');

        $this->assertEquals("123-123", $giftcardTransaction->getUuid());
        $this->assertEquals(180, $giftcardTransaction->getAmountInCents());
        $this->assertEquals("2022-06-30T13:29:16+00:00", $giftcardTransaction->getCreatedAt()->format('c'));
    }

    /**
     * @test
     * @throws PiggyRequestException
     */
    public function it_returns_a_list_of_giftcard_transactions_when_giving_a_giftcard_program_uuid()
    {
        $giftcardProgramUuid = '8fb59dcf-fb5b-4cee-88d8-35e361e55a12';

        $this->addExpectedResponse(
            [
                [
                    "id" => 2140,
                    "uuid" => '0893a934-fa97-4ae9-8b96-90da9753ecae',
                    "amount_in_cents" => 2,
                    "type" => "STANDARD",
                    "settled" => false,
                    "card_id" => 30215,
                    "shop_id" => 15,
                    "created_at" => "2023-08-23T11:14:49+00:00"
                ],
                [
                    "id" => 2141,
                    "uuid" => '80c7f417-e65d-48ea-b102-a2ea17c85c02',
                    "amount_in_cents" => 2,
                    "type" => "STANDARD",
                    "settled" => false,
                    "card_id" => 30216,
                    "shop_id" => 15,
                    "created_at" => "2023-08-23T11:14:49+00:00"
                ]
            ]

        );

        $giftcardTransactions = $this->mockedClient->giftcardTransactions->list($giftcardProgramUuid);

        $this->assertEquals(2140, $giftcardTransactions[0]->getId());
        $this->assertEquals('0893a934-fa97-4ae9-8b96-90da9753ecae', $giftcardTransactions[0]->getUuid());
        $this->assertEquals(2, $giftcardTransactions[0]->getAmountInCents());
        $this->assertEquals("STANDARD", $giftcardTransactions[0]->getType());
        $this->assertFalse($giftcardTransactions[0]->isSettled());
        $this->assertEquals(30215, $giftcardTransactions[0]->getGiftcardId());
        $this->assertEquals("2023-08-23T11:14:49+00:00", $giftcardTransactions[0]->getCreatedAt()->format('c'));

        $this->assertEquals(2141, $giftcardTransactions[1]->getId());
        $this->assertEquals('80c7f417-e65d-48ea-b102-a2ea17c85c02', $giftcardTransactions[1]->getUuid());
        $this->assertEquals(2, $giftcardTransactions[1]->getAmountInCents());
        $this->assertEquals("STANDARD", $giftcardTransactions[1]->getType());
        $this->assertFalse($giftcardTransactions[1]->isSettled());
        $this->assertEquals(30216, $giftcardTransactions[1]->getGiftcardId());
        $this->assertEquals("2023-08-23T11:14:49+00:00", $giftcardTransactions[1]->getCreatedAt()->format('c'));
    }
}
