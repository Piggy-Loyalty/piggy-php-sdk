<?php

namespace Piggy\Api\Tests\OAuth\ContactIdentifiers;

use Piggy\Api\Models\Contacts\Contact;
use Piggy\Api\Tests\OAuthTestCase;

/**
 * Class ContactIdentifiersResourceTest
 * @package Piggy\Api\Tests\OAuth\ContactIdentifiers
 */
class ContactIdentifiersResourceTest extends OAuthTestCase
{
    /**
     * @test
     */
    public function it_returns_contact_identifier_by_value()
    {
        $this->addExpectedResponse([
            "value" => "1",
            "name" => 'Piggy',
            "active" => true
        ]);

        $contactIdentifier = $this->mockedClient->contactIdentifiers->get("1");

        $this->assertEquals("Piggy", $contactIdentifier->getName());
        $this->assertEquals("1", $contactIdentifier->getValue());
        $this->assertEquals(true, $contactIdentifier->isActive());
    }

    /**
     * @test
     */
    public function it_creates_a_contact_identifier()
    {
        $this->addExpectedResponse([
            "value" => "1",
            "name" => 'Piggy',
            "active" => true
        ]);

        $contactIdentifier = $this->mockedClient->contactIdentifiers->create("hash123", "3");

        $this->assertEquals("Piggy", $contactIdentifier->getName());
        $this->assertEquals("1", $contactIdentifier->getValue());
        $this->assertEquals(true, $contactIdentifier->isActive());
    }

    /**
     * @test
     */
    public function it_creates_a_contact_identifier_anonymously()
    {
        $this->addExpectedResponse([
            "name" => "hash123",
            "value" => "hash123",
            "active" => true,
            "contact" => [
                "uuid" => 1,
                "email" => "3582303465-QRCODE123@anonymous.piggy.nl",
            ]
        ]);

        $data = $this->mockedClient->contactIdentifiers->createAnonymously("hash123");

        $this->assertEquals("hash123", $data->getValue());
        $this->assertEquals("hash123", $data->getName());
        $this->assertEquals(true, $data->isActive());
        $this->assertEquals(new Contact(
            "1",
            "3582303465-QRCODE123@anonymous.piggy.nl",
            null,
            null,
            null,
            null,
            null
        ), $data->getContact());
    }
}
