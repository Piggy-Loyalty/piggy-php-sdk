<?php

namespace Piggy\Api\Tests\OAuth\Vouchers;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Tests\OAuthTestCase;

class PromotionAttributesResourceTest extends OAuthTestCase
{
    /** @test
     * @throws PiggyRequestException
     */
    public function it_creates_a_promotion_attribute()
    {
        $this->addExpectedResponse(
            [
                'name' => 'someName',
                'description' => 'someDescription',
                'label' => 'someLabel',
                'type' => 'text',
            ]
        );

        $promotionAttribute = $this->mockedClient->promotionAttributes->create('someName', 'someDescription', 'someLabel', 'text', []);
        $this->assertEquals('someName', $promotionAttribute->getName());
        $this->assertEquals('someDescription', $promotionAttribute->getDescription());
        $this->assertEquals('someLabel', $promotionAttribute->getLabel());
        $this->assertEquals('text', $promotionAttribute->getType());
    }

    /** @test
     * @throws PiggyRequestException
     */
    public function it_creates_a_promotion_attribute_with_options()
    {
        $this->addExpectedResponse(
            [
                'name' => 'someName',
                'description' => 'someDescription',
                'label' => 'someLabel',
                'type' => 'select',
                'options' => [
                    ['label' => 'Noord-Holland', 'value' => 'noord_holland'],
                    ['label' => 'Zuid-Holland', 'value' => 'zuid_holland'],
                ],
            ]
        );

        $promotionAttribute = $this->mockedClient->promotionAttributes->create('someName', 'someDescription', 'someLabel', 'text',
            [
                ['label' => 'Noord-Holland', 'value' => 'noord_holland'],
                ['label' => 'Zuid-Holland', 'value' => 'zuid_holland'],
            ]
        );

        $this->assertEquals('someName', $promotionAttribute->getName());
        $this->assertEquals('someDescription', $promotionAttribute->getDescription());
        $this->assertEquals('someLabel', $promotionAttribute->getLabel());
        $this->assertEquals('select', $promotionAttribute->getType());
        $this->assertEquals([['label' => 'Noord-Holland', 'value' => 'noord_holland'], ['label' => 'Zuid-Holland', 'value' => 'zuid_holland']], $promotionAttribute->getOptions());
    }

    /** @test
     * @throws PiggyRequestException
     */
    public function it_returns_a_list_of_promotion_attributes_without_options()
    {
        $this->addExpectedResponse(
            [
                [
                    'name' => 'someName',
                    'description' => 'someDescription',
                    'label' => 'someLabel',
                    'type' => 'select',
                    'options' => [
                        ['label' => 'Noord-Holland', 'value' => 'noord_holland'],
                        ['label' => 'Zuid-Holland', 'value' => 'zuid_holland'],
                    ],
                ],
                [
                    'name' => 'someName2',
                    'description' => 'someDescription2',
                    'label' => 'someLabel2',
                    'type' => 'select',
                    'options' => [
                        ['label' => 'Nederland', 'value' => 'nl'],
                        ['label' => 'België', 'value' => 'be'],
                    ],
                ],
            ]);

        $promotionAttributes = $this->mockedClient->promotionAttributes->list();

        $this->assertEquals('someName', $promotionAttributes[0]->getName());
        $this->assertEquals('someDescription', $promotionAttributes[0]->getDescription());
        $this->assertEquals('someLabel', $promotionAttributes[0]->getLabel());
        $this->assertEquals('select', $promotionAttributes[0]->getType());
        $this->assertEquals([['label' => 'Noord-Holland', 'value' => 'noord_holland'], ['label' => 'Zuid-Holland', 'value' => 'zuid_holland']], $promotionAttributes[0]->getOptions());

        $this->assertEquals('someName2', $promotionAttributes[1]->getName());
        $this->assertEquals('someDescription2', $promotionAttributes[1]->getDescription());
        $this->assertEquals('someLabel2', $promotionAttributes[1]->getLabel());
        $this->assertEquals('select', $promotionAttributes[1]->getType());
        $this->assertEquals([['label' => 'Nederland', 'value' => 'nl'], ['label' => 'België', 'value' => 'be']], $promotionAttributes[1]->getOptions());

    }

    /** @test
     */
    public function it_returns_a_promotion_attribute()
    {
        $this->addExpectedResponse(
            [
                'name' => 'someName',
                'description' => 'someDescription',
                'label' => 'someLabel',
                'type' => 'select',
                'options' => [
                    ['label' => 'Noord-Holland', 'value' => 'noord_holland'],
                    ['label' => 'Zuid-Holland', 'value' => 'zuid_holland'],
                ],
                'id' => 1,
            ]
        );

        $promotionAttribute = $this->mockedClient->promotionAttributes->get(1);

        $this->assertEquals('someName', $promotionAttribute->getName());
        $this->assertEquals('someDescription', $promotionAttribute->getDescription());
        $this->assertEquals('someLabel', $promotionAttribute->getLabel());
        $this->assertEquals('select', $promotionAttribute->getType());
        $this->assertEquals([['label' => 'Noord-Holland', 'value' => 'noord_holland'], ['label' => 'Zuid-Holland', 'value' => 'zuid_holland']], $promotionAttribute->getOptions());
        $this->assertEquals('1', $promotionAttribute->getId());
    }
}
