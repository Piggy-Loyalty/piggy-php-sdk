<?php

namespace Piggy\Api\Tests\OAuth\Contacts;

use Piggy\Api\Tests\OAuthTestCase;



class ContactAttributesResourceTest extends OAuthTestCase
{
    /** @test
     */
    public function it_returns_a_list_of_contact_attributes()
    {
        $this->addExpectedResponse([
            [
                "name" => "first_name",
                "label" => "some_label",
                "description" => "some_description",
                "type" => "some_type",
                "field_type" => "some_field_type",
                "is_soft_read_only" => false,
                "is_hard_read_only" => false,
                "is_piggy_defined" => true,
                "options" => []
            ],
            [
                "name" => "another_first_name",
                "label" => "another_some_label",
                "description" => "another_some_description",
                "type" => "another_some_type",
                "field_type" => "another_some_field_type",
                "is_soft_read_only" => true,
                "is_hard_read_only" => true,
                "is_piggy_defined" => false,
                "options" => ["label" => "some_label", "value" => 1]
            ],
        ]);

        $contactAttributes = $this->mockedClient->contactAttributes->list();

        var_dump('contactattr;', $contactAttributes);

        $this->assertEquals("first_name", $contactAttributes[0]->getName());
        $this->assertEquals("some_label", $contactAttributes[0]->getLabel());
        $this->assertEquals("some_description", $contactAttributes[0]->getDescription());
        $this->assertEquals("some_type", $contactAttributes[0]->getType());
        $this->assertEquals("some_field_type", $contactAttributes[0]->getFieldType());
        $this->assertEquals(false, $contactAttributes[0]->getIsSoftReadOnly());
        $this->assertEquals(false, $contactAttributes[0]->getIsHardReadOnly());
        $this->assertEquals(true, $contactAttributes[0]->getIsPiggyDefined());
        $this->assertEquals([], $contactAttributes[0]->getOptions());

        $this->assertEquals("first_name", $contactAttributes[1]->getName());
        $this->assertEquals("some_label", $contactAttributes[1]->getLabel());
        $this->assertEquals("some_description", $contactAttributes[1]->getDescription());
        $this->assertEquals("some_type", $contactAttributes[1]->getType());
        $this->assertEquals("some_field_type", $contactAttributes[1]->getFieldType());
        $this->assertEquals(false, $contactAttributes[1]->getIsSoftReadOnly());
        $this->assertEquals(false, $contactAttributes[1]->getIsHardReadOnly());
        $this->assertEquals(true, $contactAttributes[1]->getIsPiggyDefined());
        $this->assertEquals('some_label', $contactAttributes[1]->getOptions()->getLabel());
        $this->assertEquals(1, $contactAttributes[1]->getOptions()->getValue());


    }
}