<?php

namespace Piggy\Api\Tests\OAuth\ContactAttributes;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Tests\OAuthTestCase;


class ContactAttributesResourceTest extends OAuthTestCase
{
    /** @test
     * @throws PiggyRequestException
     */
    public function it_returns_a_list_of_contact_attributes()
    {
        $this->addExpectedResponse([
            [
                "name" => "first_name",
                "label" => "some_label",
                "description" => null,
                "data_type" => "some_type",
                "is_soft_read_only" => false,
                "is_hard_read_only" => false,
                "is_piggy_defined" => true,
                "options" => []
            ],
            [
                "name" => "another_first_name",
                "label" => "another_label",
                "description" => "another_description",
                "data_type" => "multi_select",
                "is_soft_read_only" => true,
                "is_hard_read_only" => true,
                "is_piggy_defined" => false,
                "options" => ["label" => "some_option_label", "value" => 'blablabla']
            ],
        ]);

        $contactAttributes = $this->mockedClient->contactAttributes->list();

        $this->assertEquals("first_name", $contactAttributes[0]->getName());
        $this->assertEquals("some_label", $contactAttributes[0]->getLabel());
        $this->assertEquals(null, $contactAttributes[0]->getDescription());
        $this->assertEquals("some_type", $contactAttributes[0]->getType());
        $this->assertEquals(false, $contactAttributes[0]->getIsSoftReadOnly());
        $this->assertEquals(false, $contactAttributes[0]->getIsHardReadOnly());
        $this->assertEquals(true, $contactAttributes[0]->getIsPiggyDefined());

        $this->assertEquals("another_first_name", $contactAttributes[1]->getName());
        $this->assertEquals("another_label", $contactAttributes[1]->getLabel());
        $this->assertEquals("another_description", $contactAttributes[1]->getDescription());
        $this->assertEquals("multi_select", $contactAttributes[1]->getType());
        $this->assertEquals(true, $contactAttributes[1]->getIsSoftReadOnly());
        $this->assertEquals(true, $contactAttributes[1]->getIsHardReadOnly());
        $this->assertEquals(false, $contactAttributes[1]->getIsPiggyDefined());
        $this->assertEquals('some_option_label', $contactAttributes[1]->getOptions()->getLabel());
        $this->assertEquals(1, $contactAttributes[1]->getOptions()->getValue());

    }

    /** @test
     * @throws PiggyRequestException
     */
    public function it_creates_a_contact_attribute()
    {
        $this->addExpectedResponse([
            "name" => "some_name",
            "label" => "some_label",
            "data_type" => "url",

            "description" => "some_description",
            "options" => []
        ]);

        $contactAttribute = $this->mockedClient->contactAttributes->create('something', '22', 'url');

        $this->assertEquals("some_name", $contactAttribute->getName());
        $this->assertEquals("some_label", $contactAttribute->getLabel());
        $this->assertEquals("url", $contactAttribute->getType());
        $this->assertEquals("some_description", $contactAttribute->getDescription());
        $this->assertEquals(null, $contactAttribute->getOptions());

    }
}