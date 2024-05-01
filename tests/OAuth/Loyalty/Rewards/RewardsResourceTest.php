<?php

namespace Piggy\Api\Tests\OAuth\Loyalty\Rewards;

use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Tests\OAuthTestCase;

class RewardsResourceTest extends OAuthTestCase
{
    /**
     * @test
     */
    public function it_returns_all_rewards()
    {
        $this->addExpectedResponse([
            [
                'uuid' => '123-123',
                'title' => 'rewardTitle',
                'description' => 'description',
                'media' => [
                    'value' => 'www.afbeelding.nl',
                    'type' => 'image',
                ],
                'active' => true,
                'reward_type' => 'DIGITAL',
            ],
            [
                'uuid' => '123-126',
                'title' => 'Physical Reward',
                'description' => 'Good Reward',
                'media' => [
                    'value' => 'www.afbeelding.nl',
                    'type' => 'image',
                ],
                'active' => true,
                'reward_type' => 'PHYSICAL',
            ],
        ]);

        $reward = $this->mockedClient->rewards->list();

        $this->assertEquals('123-123', $reward[0]->getUuid());
        $this->assertEquals('rewardTitle', $reward[0]->getTitle());
        $this->assertEquals('description', $reward[0]->getDescription());
        $this->assertEquals('www.afbeelding.nl', $reward[0]->getMedia()->getValue());
        $this->assertEquals('image', $reward[0]->getMedia()->getType());
        $this->assertEquals(true, $reward[0]->isActive());

        $this->assertEquals('123-126', $reward[1]->getUuid());
        $this->assertEquals('Physical Reward', $reward[1]->getTitle());
        $this->assertEquals('Good Reward', $reward[1]->getDescription());
        $this->assertEquals('www.afbeelding.nl', $reward[1]->getMedia()->getValue());
        $this->assertEquals('image', $reward[1]->getMedia()->getType());
        $this->assertEquals(true, $reward[1]->isActive());
    }

    /**
     * @test
     *
     * @throws GuzzleException
     * @throws PiggyRequestException
     */
    public function it_returns_all_rewards_for_a_contact()
    {
        $this->addExpectedResponse([[
            'uuid' => '123-123',
            'title' => 'rewardTitle',
            'description' => 'description',
            'media' => [
                'value' => 'www.afbeelding.nl',
                'type' => 'image',
            ],
            'active' => true,
            'reward_type' => 'DIGITAL',
        ], [
            'uuid' => '123-126',
            'title' => 'Physical Reward',
            'description' => 'Good Reward',
            'media' => [
                'value' => 'www.afbeelding.nl',
                'type' => 'image',
            ],
            'active' => true,
            'reward_type' => 'PHYSICAL',
        ]]);

        $reward = $this->mockedClient->rewards->get('123-1231');

        $this->assertEquals('123-123', $reward[0]->getUuid());
        $this->assertEquals('rewardTitle', $reward[0]->getTitle());
        $this->assertEquals('description', $reward[0]->getDescription());
        $this->assertEquals('www.afbeelding.nl', $reward[0]->getMedia()->getValue());
        $this->assertEquals('image', $reward[0]->getMedia()->getType());
        $this->assertEquals(true, $reward[0]->isActive());

        $this->assertEquals('123-126', $reward[1]->getUuid());
        $this->assertEquals('Physical Reward', $reward[1]->getTitle());
        $this->assertEquals('Good Reward', $reward[1]->getDescription());
        $this->assertEquals('www.afbeelding.nl', $reward[1]->getMedia()->getValue());
        $this->assertEquals('image', $reward[1]->getMedia()->getType());
        $this->assertEquals(true, $reward[1]->isActive());
    }

    /**
     * @test
     */
    public function it_can_find_a_reward_by_uuid()
    {
        $this->addExpectedResponse([
            'uuid' => '123-123',
            'title' => 'rewardTitle',
            'description' => 'description',
            'media' => [
                'value' => 'www.afbeelding.nl',
                'type' => 'image',
            ],
            'active' => true,
            'reward_type' => 'DIGITAL',
        ]);

        $reward = $this->mockedClient->rewards->findBy('123-123');

        $this->assertEquals('123-123', $reward->getUuid());
        $this->assertEquals('rewardTitle', $reward->getTitle());
        $this->assertEquals('description', $reward->getDescription());
        $this->assertEquals('www.afbeelding.nl', $reward->getMedia()->getValue());
        $this->assertEquals('image', $reward->getMedia()->getType());
        $this->assertEquals(true, $reward->isActive());
    }
}
