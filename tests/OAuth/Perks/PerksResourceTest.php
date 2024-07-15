<?php

namespace Piggy\Api\Tests\OAuth\Perks;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Tests\OAuthTestCase;

class PerksResourceTest extends OAuthTestCase
{
    /**
     * @test
     *
     * @throws PiggyRequestException
     */
    public function it_returns_a_list_with_perks(): void
    {
        $this->addExpectedResponse([
            [
                'uuid' => 'first-uuid',
                'label' => 'Some perk',
                'name' => 'some_perk',
                'data_type' => 'single_select'
            ],
            [
                'uuid' => 'second-uuid',
                'label' => 'Some second perk',
                'name' => 'some_second_perk',
                'data_type' => 'boolean'
            ],
        ]);

        $perks = $this->mockedClient->perk->list();

        $this->assertEquals('first-uuid', $perks[0]->getUuid());

        $this->assertEquals('second-uuid', $perks[1]->getUuid());
    }

    /**
     * @test
     *
     * @throws PiggyRequestException
     */
    public function it_gets_a_perk(): void
    {
        $this->addExpectedResponse([
            'uuid' => 'some-uuid',
            'label' => 'Some perk',
            'name' => 'some_perk',
            'data_type' => 'single_select',
            'options' => [
                [
                    'label' => 'Option 1',
                    'value' => 'option_1',
                    'default' => true,
                ],
                [
                    'label' => 'Option 2',
                    'value' => 'option_2',
                    'default' => false,
                ]
            ],
        ]);

        $perk = $this->mockedClient->perk->get('first-uuid');

        $this->assertEquals('some-uuid', $perk->getUuid());
    }
}
