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
                "description" => "some_description",
                "type" => "some_type",
                "is_soft_read_only" => false,
                "is_hard_read_only" => false,
                "is_piggy_defined" => true,
                "options" => []
            ],
            [
                "name" => "another_first_name",
                "label" => "another_some_label",
                "description" => "another_some_description",
                "type" => "multi_select",
                "is_soft_read_only" => true,
                "is_hard_read_only" => true,
                "is_piggy_defined" => false,
                "options" => ["label" => "some_label", "value" => 1]
            ],
        ]);

        $contactAttributes = $this->mockedClient->contactAttributes->list();

//        var_dump('pietje', $contactAttributes);
//        die;

        $this->assertEquals("first_name", $contactAttributes[0]->getName());
        $this->assertEquals("some_label", $contactAttributes[0]->getLabel());
        $this->assertEquals("some_description", $contactAttributes[0]->getDescription());
        $this->assertEquals("some_type", $contactAttributes[0]->getType());
        $this->assertEquals(false, $contactAttributes[0]->getIsSoftReadOnly());
        $this->assertEquals(false, $contactAttributes[0]->getIsHardReadOnly());
        $this->assertEquals(true, $contactAttributes[0]->getIsPiggyDefined());

        $this->assertEquals("another_first_name", $contactAttributes[1]->getName());
        $this->assertEquals("another_some_label", $contactAttributes[1]->getLabel());
        $this->assertEquals("another_some_description", $contactAttributes[1]->getDescription());
        $this->assertEquals("multi_select", $contactAttributes[1]->getType());
        $this->assertEquals(true, $contactAttributes[1]->getIsSoftReadOnly());
        $this->assertEquals(true, $contactAttributes[1]->getIsHardReadOnly());
        $this->assertEquals(false, $contactAttributes[1]->getIsPiggyDefined());
        $this->assertEquals('some_label', $contactAttributes[1]->getOptions()->getLabel());
        $this->assertEquals(1, $contactAttributes[1]->getOptions()->getValue());


//        $this->assertEquals(99, $contact->getCreditBalance()->getBalance());
//        $this->assertEquals("SUBSCRIBED", $contact->getSubscriptions()[0]->getStatus());
//        $this->assertEquals(true, $contact->getSubscriptions()[0]->isSubscribed());
//        $this->assertEquals('23-23-pi-gg-y', $contact->getSubscriptions()[0]->getSubscriptionType()->getUuid());
//        $this->assertEquals('Functional', $contact->getSubscriptions()[0]->getSubscriptionType()->getName());
//        $this->assertEquals('Functional emails', $contact->getSubscriptions()[0]->getSubscriptionType()->getDescription());
//        $this->assertEquals(true, $contact->getSubscriptions()[0]->getSubscriptionType()->isActive());
//        $this->assertEquals('OPT_OUT', $contact->getSubscriptions()[0]->getSubscriptionType()->getStrategy());
////        $this->assertEquals("Henk", $contact->getAttributes()[0]->getValue());
//        $this->assertEquals("firstName", $contact->getAttributes()[0]->getAttribute()->getName());
//        $this->assertEquals("Nombre", $contact->getAttributes()[0]->getAttribute()->getLabel());
//        $this->assertEquals("Voornaam", $contact->getAttributes()[0]->getAttribute()->getDescription());
//        $this->assertEquals("text", $contact->getAttributes()[0]->getAttribute()->getType());
//        $this->assertEquals("text", $contact->getAttributes()[0]->getAttribute()->getFieldType());
//        $this->assertEquals(false, $contact->getAttributes()[0]->getAttribute()->getIsSoftReadOnly());
//        $this->assertEquals(false, $contact->getAttributes()[0]->getAttribute()->getIsHardReadOnly());
//        $this->assertEquals(true, $contact->getAttributes()[0]->getAttribute()->getIsPiggyDefined());
//        $this->assertEquals([], $contact->getAttributes()[0]->getAttribute()->getOptions());
    }
}