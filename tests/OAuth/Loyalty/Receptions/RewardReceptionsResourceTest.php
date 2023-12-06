<?php

namespace Piggy\Api\Tests\OAuth\Loyalty\Receptions;

use Exception;
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
     * @throws PiggyRequestException
     * @throws Exception
     */
    public function it_returns_a_physical_reward_reception()
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
            "title" => "reward title",
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
        $this->assertEquals("2022-06-30T13:42:04+00:00", $rewardReception->getCreatedAt()->format('c'));
        $this->assertEquals("reward title", $rewardReception->getTitle());
        $this->assertEquals("PHYSICAL", $rewardReception->getReward()->getRewardType());
        $this->assertEquals('332-3232', $rewardReception->getReward()->getUuid());
        $this->assertEquals("2022-06-30T15:11:57+00:00", $rewardReception->getExpiresAt()->format('c'));
        $this->assertEquals(false, $rewardReception->getHasBeenCollected());
    }

    /**
     * @test
     * @throws PiggyRequestException
     * @throws Exception
     */
    public function it_returns_a_digital_reward_reception()
    {
        $this->addExpectedResponse([
            "type" => "digital_reward_reception",
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
            "title" => "digital reward title",
            "digital_reward" => [
                "reward_type" => "DIGITAL",
                "uuid" => '332-3232'
            ],
            "digital_reward_code" => [
                "code" => 'kortingscode'
            ]
        ]);

        $rewardReception = $this->mockedClient->rewardReceptions->create('123-123', '123-312', '123-lol');

        $this->assertEquals("digital_reward_reception", $rewardReception->getType());
        $this->assertEquals(-40, $rewardReception->getCredits());
        $this->assertEquals("123-lol", $rewardReception->getUuid());
        $this->assertEquals("123-123", $rewardReception->getContact()->getUuid());
        $this->assertEquals("123-312", $rewardReception->getShop()->getUuid());
        $this->assertEquals("shopName", $rewardReception->getShop()->getName());
        $this->assertEquals("2022-06-30T13:42:04+00:00", $rewardReception->getCreatedAt()->format('c'));
        $this->assertEquals("digital reward title", $rewardReception->getTitle());
        $this->assertEquals("DIGITAL", $rewardReception->getDigitalReward()->getRewardType());
        $this->assertEquals('332-3232', $rewardReception->getDigitalReward()->getUuid());
        $this->assertEquals("kortingscode", $rewardReception->getDigitalRewardCode()->getCode());
    }
}
