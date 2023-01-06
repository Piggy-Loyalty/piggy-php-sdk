<?php

namespace Piggy\Api\Tests\OAuth\Loyalty\Tokens;

use Exception;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Tests\OAuthTestCase;

/**
 * Class CreditReceptionsResourceTest
 * @package Piggy\Api\Tests\OAuth\Loyalty
 */
class LoyaltyTokenResourceTest extends OAuthTestCase
{
    /**
     * @test
     * @throws PiggyRequestException
     * @throws Exception
     */
    public function it_returns_a_credit_based_loyalty_token_url()
    {
        $this->addExpectedResponse([
            "data" => 'https://customer.piggy.nl/l?version=v1&shop_id=15&credits=20&unique_id=my_unique_id&timestamp=1672931049&hash=a9d8163cfb19b0b46d6ded40c0817de11be48bbf'
        ]);

        $loyaltyToken = $this->mockedClient->loyaltyToken->create('15', 'my_unique_id', '20');

        $this->assertEquals('https://customer.piggy.nl/l?version=v1&shop_id=15&credits=20&unique_id=my_unique_id&timestamp=1672931049&hash=a9d8163cfb19b0b46d6ded40c0817de11be48bbf', $loyaltyToken);

    }

    /**
     * @test
     * @throws PiggyRequestException
     * @throws Exception
     */
    public function it_returns_a_unit_based_loyalty_token_url()
    {
        $this->addExpectedResponse([
            'data' => 'https://customer.piggy.nl/l?version=v2&shop_id=15&unique_id=my_unique_id&timestamp=1672997328&unit_name=purchase_amount&unit_value=10&hash=def61056136472eac549b6d5a5f0c242f23b4146'
        ]);

        $loyaltyToken = $this->mockedClient->loyaltyToken->create('15', 'my_unique_id', 'purchase_amount', '10');

        $this->assertEquals("15", $loyaltyToken->getShopId());
        $this->assertEquals("my_unique_id", $loyaltyToken->getUniqueId());
        $this->assertEquals("purchase_amount", $loyaltyToken->getUnitName());
        $this->assertEquals("10", $loyaltyToken->getUnitValue());

        $this->assertEquals('https://customer.piggy.nl/l?version=v1&shop_id=15&credits=20&unique_id=my_unique_id&timestamp=1672931049&hash=a9d8163cfb19b0b46d6ded40c0817de11be48bbf', $loyaltyToken);


    }


}
