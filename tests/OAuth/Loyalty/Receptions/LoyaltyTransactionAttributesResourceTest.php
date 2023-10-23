<?php

namespace Piggy\Api\Tests\OAuth\Loyalty\Receptions;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Tests\OAuthTestCase;

class LoyaltyTransactionAttributesResourceTest extends OAuthTestCase
{
    /** @test
     * @throws PiggyRequestException
     */
    public function it_returns_a_list_of_loyalty_transaction_attributes()
    {
        $this->addExpectedResponse([
            [
                "name" => "someAttribute",
                "label" => "Some Attribute",
                "placeholder" => null,
                "type" => "text",
                "field_type" => "text",
                "options" => [],
                "is_piggy_defined" => false,
                "is_soft_read_only" => false,
                "is_hard_read_only" => false
            ],
            [
                "name" => "someAttribute2",
                "label" => "Some Attribute 2",
                "placeholder" => null,
                "type" => "text",
                "field_type" => "text",
                "options" => [],
                "is_piggy_defined" => false,
                "is_soft_read_only" => false,
                "is_hard_read_only" => false
            ]
        ]);

        $loyaltyTransactionAttributes = $this->mockedClient->loyaltyTransactionAttributes->list();

        $this->assertEquals('someAttribute', $loyaltyTransactionAttributes[0]->getName());
        $this->assertEquals('Some Attribute', $loyaltyTransactionAttributes[0]->getLabel());
        $this->assertNull($loyaltyTransactionAttributes[0]->getPlaceholder());
        $this->assertEquals('text', $loyaltyTransactionAttributes[0]->getType());
        $this->assertEquals('text', $loyaltyTransactionAttributes[0]->getFieldType());
        $this->assertEmpty($loyaltyTransactionAttributes[0]->getOptions());
        $this->assertFalse($loyaltyTransactionAttributes[0]->isPiggyDefined());
        $this->assertFalse($loyaltyTransactionAttributes[0]->isSoftReadOnly());
        $this->assertFalse($loyaltyTransactionAttributes[0]->isHardReadOnly());

        $this->assertEquals('someAttribute2', $loyaltyTransactionAttributes[1]->getName());
        $this->assertEquals('Some Attribute 2', $loyaltyTransactionAttributes[1]->getLabel());
        $this->assertNull($loyaltyTransactionAttributes[1]->getPlaceholder());
        $this->assertEquals('text', $loyaltyTransactionAttributes[1]->getType());
        $this->assertEquals('text', $loyaltyTransactionAttributes[1]->getFieldType());
        $this->assertEmpty($loyaltyTransactionAttributes[1]->getOptions());
        $this->assertFalse($loyaltyTransactionAttributes[1]->isPiggyDefined());
        $this->assertFalse($loyaltyTransactionAttributes[1]->isSoftReadOnly());
        $this->assertFalse($loyaltyTransactionAttributes[1]->isHardReadOnly());
    }

    /** @test
     * @throws PiggyRequestException
     */
    public function it_creates_a_loyalty_transaction_attribute()
    {
        $this->addExpectedResponse([
            "name" => "someAttribute",
            "label" => "Some Attribute",
            "placeholder" => null,
            "type" => "text",
            "field_type" => "text",
            "options" => [],
            "is_piggy_defined" => false,
            "is_soft_read_only" => false,
            "is_hard_read_only" => false
        ]);

        $loyaltyTransactionAttributes = $this->mockedClient->loyaltyTransactionAttributes->create('someAttribute', 'text');

        $this->assertEquals('someAttribute', $loyaltyTransactionAttributes->getName());
        $this->assertEquals('Some Attribute', $loyaltyTransactionAttributes->getLabel());
        $this->assertNull($loyaltyTransactionAttributes->getPlaceholder());
        $this->assertEquals('text', $loyaltyTransactionAttributes->getType());
        $this->assertEquals('text', $loyaltyTransactionAttributes->getFieldType());
        $this->assertEmpty($loyaltyTransactionAttributes->getOptions());
        $this->assertFalse($loyaltyTransactionAttributes->isPiggyDefined());
        $this->assertFalse($loyaltyTransactionAttributes->isSoftReadOnly());
        $this->assertFalse($loyaltyTransactionAttributes->isHardReadOnly());
    }

}