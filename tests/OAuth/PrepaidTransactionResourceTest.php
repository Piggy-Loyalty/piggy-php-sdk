<?php

namespace Piggy\Api\Tests\OAuth;

use Piggy\Api\Models\Contacts\SubscriptionType;
use Piggy\Api\Tests\OAuthTestCase;

/**
 * Class ContactSubscriptionResourceTest
 * @package Piggy\Api\Tests\OAuth
 */
class PrepaidTransactionResourceTest extends OAuthTestCase
{
    /**
     * @test
     */
    public function it_returns_a_list_of_subscription_types_of_an_account()
    {
        $this->addExpectedResponse([
            "amount_in_cents" => 10,
            "prepaid_balance" => [
                "balance_in_cents" => 210
            ],
            "uuid" => '123-123',
            "created_at" => '123'
        ]);

        $data = $this->mockedClient->prepaidTransactions->create('123-123', 10, '321-321');

        $this->assertEquals(10, $data->getAmountInCents());
        $this->assertEquals(210, $data->getPrepaidBalance()->getBalanceInCents());
    }
}
