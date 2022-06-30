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
class RewardReceptionsResourceTest extends OAuthTestCase
{
    /**
     * @test
     * @throws GuzzleException
     * @throws PiggyRequestException
     * @throws Exception
     */
    public function it_returns_a_reward_reception()
    {
        $this->addExpectedResponse([
            "type" => "reward_reception",
            "credits" => -40,
            "uuid" => "123-lol",
            "contact" => [
                "uuid" => '123-123'
            ],
            "shop" => [
                "name" => 'shopName',
                "uuid" => "123-312"
            ],
            "created_at" => "2022-06-30T13:42:04+00:00",
            "reward" => [
                "reward_type" => "PHYSICAL",
                "uuid" => '332-3232'
            ],
            "expires_at" => "2022-06-30T15:11:57+00:00",
            "has_been_collected" => false
        ]);

        $rewardReception = $this->mockedClient->rewardReceptions->create('123-123', '123-312', '123-lol');

        $this->assertEquals("reward_reception", $rewardReception->getType());
        $this->assertEquals(-40, $rewardReception->getCredits());
        $this->assertEquals("123-lol", $rewardReception->getUuid());
        $this->assertEquals("123-123", $rewardReception->getContact()->getUuid());
        $this->assertEquals("123-312", $rewardReception->getShop()->getUuid());
        $this->assertEquals("shopName", $rewardReception->getShop()->getName());
//        $this->assertEquals("2022-06-30T13:42:04+00:00", $rewardReception->getCreatedAt()->format('c'));
//        $this->assertEquals("PHYSICAL", $rewardReception->getReward()->getType())
        $this->assertEquals('332-3232', $rewardReception->getReward()->getUuid());
//        $this->assertEquals("2022-06-30T15:11:57+00:00", $rewardReception->getExpiresAt());
        $this->assertEquals(false, $rewardReception->getHasBeenCollected());
    }
}
