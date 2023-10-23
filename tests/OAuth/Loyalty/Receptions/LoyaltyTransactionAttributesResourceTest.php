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

        $LoyaltyTransactionAttributes = $this->mockedClient->loyaltyTransactionAttributes->list();

        $this->assertEquals('someAttribute', $LoyaltyTransactionAttributes[0]->getName());
        $this->assertEquals('Some Attribute', $LoyaltyTransactionAttributes[0]->getLabel());
        $this->assertNull($LoyaltyTransactionAttributes[0]->getPlaceholder());
        $this->assertEquals('text', $LoyaltyTransactionAttributes[0]->getType());
        $this->assertEquals('text', $LoyaltyTransactionAttributes[0]->getFieldType());
        $this->assertEmpty($LoyaltyTransactionAttributes[0]->getOptions());
        $this->assertFalse($LoyaltyTransactionAttributes[0]->isPiggyDefined());
        $this->assertFalse($LoyaltyTransactionAttributes[0]->isSoftReadOnly());
        $this->assertFalse($LoyaltyTransactionAttributes[0]->isHardReadOnly());

        $this->assertEquals('someAttribute2', $LoyaltyTransactionAttributes[1]->getName());
        $this->assertEquals('Some Attribute 2', $LoyaltyTransactionAttributes[1]->getLabel());
        $this->assertNull($LoyaltyTransactionAttributes[1]->getPlaceholder());
        $this->assertEquals('text', $LoyaltyTransactionAttributes[1]->getType());
        $this->assertEquals('text', $LoyaltyTransactionAttributes[1]->getFieldType());
        $this->assertEmpty($LoyaltyTransactionAttributes[1]->getOptions());
        $this->assertFalse($LoyaltyTransactionAttributes[1]->isPiggyDefined());
        $this->assertFalse($LoyaltyTransactionAttributes[1]->isSoftReadOnly());
        $this->assertFalse($LoyaltyTransactionAttributes[1]->isHardReadOnly());
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

        $LoyaltyTransactionAttributes = $this->mockedClient->loyaltyTransactionAttributes->create('someAttribute', 'text');

        $this->assertEquals('someAttribute', $LoyaltyTransactionAttributes->getName());
        $this->assertEquals('Some Attribute', $LoyaltyTransactionAttributes->getLabel());
        $this->assertNull($LoyaltyTransactionAttributes->getPlaceholder());
        $this->assertEquals('text', $LoyaltyTransactionAttributes->getType());
        $this->assertEquals('text', $LoyaltyTransactionAttributes->getFieldType());
        $this->assertEmpty($LoyaltyTransactionAttributes->getOptions());
        $this->assertFalse($LoyaltyTransactionAttributes->isPiggyDefined());
        $this->assertFalse($LoyaltyTransactionAttributes->isSoftReadOnly());
        $this->assertFalse($LoyaltyTransactionAttributes->isHardReadOnly());
    }

}