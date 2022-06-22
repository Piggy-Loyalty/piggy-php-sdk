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
            "name" => "Loyalty Card",
            "value" => "1",
            "active" => true,
            "contact" => [
                "uuid" => "11f1d2ef-0672-4d19-aa06-6dbed7c5c38b"
            ]
        ]);

        $data = $this->mockedClient->contactIdentifiers->get("1");

        $this->assertEquals("Loyalty Card", $data->getName());
        $this->assertEquals("1", $data->getValue());
        $this->assertEquals(new Contact(
            "11f1d2ef-0672-4d19-aa06-6dbed7c5c38b",
            null,
            null,
            null,
            null,
            null,
            null
        ), $data->getContact());
    }

    /**
     * @test
     */
    public function it_creates_a_contact_identifier()
    {
        $this->addExpectedResponse([
            "name" => "hash123",
            "value" => "hash123",
            "active" => true,
        ]);

        $data = $this->mockedClient->contactIdentifiers->create("hash123", "3", "2");

        $this->assertEquals("hash123", $data->getName());
        $this->assertEquals("hash123", $data->getValue());
        $this->assertEquals(true, $data->isActive());
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
