<?php

namespace Piggy\Api\Tests\OAuth\Giftcards;

use DateTimeInterface;
use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Models\Giftcards\GiftcardTransaction;
use Piggy\Api\Tests\OAuthTestCase;

/**
 * Class GiftcardTransactionsResourceTest
 * @package Piggy\Api\Tests\OAuth\Giftcards
 */
class GiftcardTransactionsResourceTest extends OAuthTestCase
{
    /**
     * @test
     * @throws GuzzleException
     * @throws PiggyRequestException
     */
    public function it_finds_a_giftcard_transaction()
    {
        $this->addExpectedResponse([
            "uuid" => '123-123',
            "amount_in_cents" => 420,
            "created_at" => "2022-06-30T13:29:16+00:00",
        ]);

        $giftcardTransaction = $this->mockedClient->giftcardTransactions->get('123-123');

        $this->assertEquals("123-123", $giftcardTransaction->getUuid());
        $this->assertEquals(420, $giftcardTransaction->getAmount());
        $this->assertEquals("2022-06-30T13:29:16+00:00", $giftcardTransaction->getCreatedAt()->format('c'));
    }

    /**
     * @test
     * @throws GuzzleException
     * @throws PiggyRequestException
     */
    public function it_returns_giftcard_transaction_after_creation()
    {
        $this->addExpectedResponse([
            "uuid" => '123-123',
            "amount_in_cents" => 420,
            "created_at" => "2022-06-30T13:29:16+00:00",
        ]);

        $giftcardTransaction = $this->mockedClient->giftcardTransactions->create(1, 2, 100);

        $this->assertEquals("123-123", $giftcardTransaction->getUuid());
        $this->assertEquals(420, $giftcardTransaction->getAmount());
        $this->assertEquals("2022-06-30T13:29:16+00:00", $giftcardTransaction->getCreatedAt()->format('c'));
    }

    /**
     * @test
     * @throws GuzzleException
     * @throws PiggyRequestException
     */
    public function it_corrects_a_giftcard_transaction()
    {
        $this->addExpectedResponse([
            "uuid" => '123-123',
            "amount_in_cents" => 420,
            "created_at" => "2022-06-30T13:29:16+00:00",
        ]);

        $giftcardTransaction = $this->mockedClient->giftcardTransactions->correct('123-123');

        $this->assertEquals("123-123", $giftcardTransaction->getUuid());
        $this->assertEquals(420, $giftcardTransaction->getAmount());
        $this->assertEquals("2022-06-30T13:29:16+00:00", $giftcardTransaction->getCreatedAt()->format('c'));
    }
}
