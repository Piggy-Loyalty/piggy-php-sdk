<?php

namespace Piggy\Api\Tests\OAuth\Loyalty\Tokens;

use Exception;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Tests\OAuthTestCase;

/**
 * Class LoyaltyTokenResourceTest
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

        $loyaltyToken = $this->mockedClient->loyaltyToken->create('v1', '15', 'my_unique_id', 20);

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

        $loyaltyToken = $this->mockedClient->loyaltyToken->create('v2', '15', 'my_unique_id',
            null, 'purchase_amount', 10);

        $this->assertEquals('https://customer.piggy.nl/l?version=v2&shop_id=15&unique_id=my_unique_id&timestamp=1672997328&unit_name=purchase_amount&unit_value=10&hash=def61056136472eac549b6d5a5f0c242f23b4146', $loyaltyToken);

    }

    /**
     * @test
     * @throws PiggyRequestException
     * @throws Exception
     */
    public function it_can_claim_a_credit_based_loyalty_token_url_and_returns_a_credit_reception()
    {
        $this->addExpectedResponse([
            "type" => "credit_reception",
            "credits" => 10,
            "contact" => [
                "credit_balance" => [
                    "balance" => 973
                ],
                "uuid" => 'aacfe5dd-5fac-46b4-aa1b-c6f695bf3ed8'
            ],
            "shop" => [
                "name" => "Visjes",
                "uuid" => "1"
            ],
            "contact_identifier" => null,
            "created_at" => "2023-01-10T15:59:58+00:00",
            "uuid" => "0c655a10-7980-4fdb-ac11-2caca19f2329",
            "unit_value" => null,
            "unit" => null
        ]);

//        $creditReception = $this->mockedClient->loyaltyToken->claim('v1', '15', "my_unique_id_30", '1673366252', "f85a019bc79a7b5a6c95d86ffa0388836367041d", "aacfe5dd-5fac-46b4-aa1b-c6f695bf3ed8", 10);

        $loyaltyToken = $this->mockedClient->loyaltyToken->claim('v1', '15', "my_unique_id_31", '1673433447', "ca856e5c8d8fa43bf4651209335a0d259bedb3db", "aacfe5dd-5fac-46b4-aa1b-c6f695bf3ed8", 10);


        $this->assertEquals('credit_reception', $loyaltyToken->getType());
        $this->assertEquals('10', $loyaltyToken->getCredits());
        $this->assertEquals(973, $loyaltyToken->getContact()->getCreditBalance()->getBalance());
        $this->assertEquals("aacfe5dd-5fac-46b4-aa1b-c6f695bf3ed8", $loyaltyToken->getContact()->getUuid());
        $this->assertEquals('Visjes', $loyaltyToken->getShop()->getName());
        $this->assertEquals('1', $loyaltyToken->getShop()->getUuid());

        $this->assertEquals('2023-01-10T15:59:58+00:00', $loyaltyToken->getCreatedAt()->format('c'));
        $this->assertEquals('0c655a10-7980-4fdb-ac11-2caca19f2329', $loyaltyToken->getUuid());
        $this->assertEquals(null, $loyaltyToken->getUnitValue());
        $this->assertEquals(null, $loyaltyToken->getUnit());

//        $this->assertEquals(null, $loyaltyToken->getContactIdentifier());
fsdfdfdsfsd

    }
}
fsdfsdfssdf