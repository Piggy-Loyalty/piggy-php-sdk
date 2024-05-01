<?php

namespace Piggy\Api\Tests\OAuth;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Tests\OAuthTestCase;

class PrepaidTransactionResourceTest extends OAuthTestCase
{
    /**
     * @test
     *
     * @throws PiggyRequestException
     */
    public function it_returns_a_list_of_subscription_types_of_an_account()
    {
        $this->addExpectedResponse([
            'amount_in_cents' => 10,
            'prepaid_balance' => [
                'balance_in_cents' => 210,
            ],
            'uuid' => '123-123',
            'created_at' => '2022-07-05T10:27:17+00:00',
        ]);

        $data = $this->mockedClient->prepaidTransactions->create('123-123', 10, '321-321');

        $this->assertEquals(10, $data->getAmountInCents());
        $this->assertEquals(210, $data->getPrepaidBalance()->getBalanceInCents());
        $this->assertEquals('123-123', $data->getUuid());
        $this->assertEquals('2022-07-05T10:27:17+00:00', $data->getCreatedAt()->format('c'));
    }
}
