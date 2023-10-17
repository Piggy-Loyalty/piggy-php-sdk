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
        $this->addExpectedResponse([
            "uuid" => '123-123',
            "amount_in_cents" => 180,
            "created_at" => "2022-06-30T13:29:16+00:00",
        ]);

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
        $this->addExpectedResponse([
            "uuid" => '123-123',
            "amount_in_cents" => 180,
            "created_at" => "2022-06-30T13:29:16+00:00",
        ]);

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
        $this->addExpectedResponse([
            "uuid" => '123-123',
            "amount_in_cents" => 180,
            "created_at" => "2022-06-30T13:29:16+00:00",
        ]);

        $giftcardTransaction = $this->mockedClient->giftcardTransactions->correct('123-123');

        $this->assertEquals("123-123", $giftcardTransaction->getUuid());
        $this->assertEquals(180, $giftcardTransaction->getAmountInCents());
        $this->assertEquals("2022-06-30T13:29:16+00:00", $giftcardTransaction->getCreatedAt()->format('c'));
    }

    /**
     * @test
     * @throws PiggyRequestException
     */
    public function it_returns_a_list_of_giftcard_transactions()
    {
        $this->addExpectedResponse([
                [
                    "uuid" => '123-123',
                    "amount_in_cents" => 180,
                    "created_at" => "2022-06-30T13:29:16+00:00"
                ],
                [
                    "uuid" => '123-123',
                    "amount_in_cents" => 360,
                    "created_at" => "2022-06-30T13:29:16+00:00"
                ]
            ]
        );

        $giftcardTransactions = $this->mockedClient->giftcardTransactions->list();

        $this->assertEquals('123-123', $giftcardTransactions[0]->getUuid());
        $this->assertEquals(180, $giftcardTransactions[0]->getAmountInCents());
        $this->assertEquals("2022-06-30T13:29:16+00:00", $giftcardTransactions[0]->getCreatedAt()->format('c'));

        $this->assertEquals('123-123', $giftcardTransactions[1]->getUuid());
        $this->assertEquals(360, $giftcardTransactions[1]->getAmountInCents());
        $this->assertEquals("2022-06-30T13:29:16+00:00", $giftcardTransactions[1]->getCreatedAt()->format('c'));

    }
}
