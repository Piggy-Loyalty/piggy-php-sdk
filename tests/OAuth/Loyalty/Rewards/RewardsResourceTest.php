<?php

namespace Piggy\Api\Tests\OAuth\Loyalty\Rewards;

use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Tests\OAuthTestCase;

/**
 * Class RewardsResourceTest
 * @package Piggy\Api\Tests\OAuth\Loyalty\Rewards
 */
class RewardsResourceTest extends OAuthTestCase
{
    /**
     * @test
     * @throws GuzzleException
     * @throws PiggyRequestException
     */
    public function it_returns_all_rewards()
    {
        $this->addExpectedResponse([
            "uuid" => "123-123",
            "title" => 'rewardTitle',
            "description" => 'description',
            "media" => [
                "value" => 'www.afbeelding.nl',
                "type" => "image"
            ],
            "active" => false
        ]);

        $reward = $this->mockedClient->rewards->get('123-123');
//        $creditReception = $this->mockedClient->creditReceptions->create('123-312', '123-123', 10);

        $this->assertEquals("uuid", $reward->getUuid());
//        $this->assertEquals($rewards["digital"], $reward);
//        $this->assertEquals($rewards["external"], $reward);
    }
}
