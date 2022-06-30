<?php

namespace Piggy\Api\Tests\OAuth\Loyalty;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Tests\OAuthTestCase;

/**
 * Class CreditReceptionsResourceTest
 * @package Piggy\Api\Tests\OAuth\Loyalty
 */
class CreditReceptionsResourceTest extends OAuthTestCase
{
    /**
     * @test
     * @throws GuzzleException
     * @throws PiggyRequestException
     * @throws Exception
     */
    public function it_returns_a_credit_reception()
    {
        $this->addExpectedResponse([
            "type" => "credit_reception",
            "credits" => 101,
            "uuid" => "123-lol",
            "contact" => [
                "uuid" => '123-123'
            ],
            "shop" => [
                "name" => 'shopName',
                "uuid" => "123-312"
            ],
            "created_at" => "2022-06-30T13:42:04+00:00",
            "unit_value" => 1011,
            "unit" => [
                "name" => 'bonkers',
                "label" => "Bonkers"
            ]
        ]);

        $creditReception = $this->mockedClient->creditReceptions->create('123-312', '123-123', 10);

        $this->assertEquals("credit_reception", $creditReception->getType());
        $this->assertEquals(101, $creditReception->getCredits());
        $this->assertEquals("123-lol", $creditReception->getUuid());
        $this->assertEquals("123-123", $creditReception->getContact()->getUuid());
        $this->assertEquals("123-312", $creditReception->getShop()->getUuid());
        $this->assertEquals("shopName", $creditReception->getShop()->getName());
//        $this->assertEquals("2022-06-30T13:42:04+00:00", $creditReception->getCreatedAt()->format('c'));
        $this->assertEquals(1011, $creditReception->getUnitValue());
        $this->assertEquals('bonkers', $creditReception->getUnit()->getName());
        $this->assertEquals("Bonkers", $creditReception->getUnit()->getLabel());
    }
}
