<?php

namespace Piggy\Api\Tests\OAuth\ContactIdentifiers;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Tests\OAuthTestCase;

/**
 * Class ContactIdentifiersResourceTest
 * @package Piggy\Api\Tests\OAuth\ContactIdentifiers
 */
class ContactIdentifiersResourceTest extends OAuthTestCase
{
    /**
     * @test
     * @throws PiggyRequestException
     */
    public function it_returns_contact_identifier_by_value()
    {
        $this->addExpectedResponse([
            "value" => "1",
            "name" => 'Piggy',
            "active" => true
        ]);

        $contactIdentifier = $this->mockedClient->contactIdentifiers->get("1");

        $this->assertEquals("1", $contactIdentifier->getValue());
        $this->assertEquals("Piggy", $contactIdentifier->getName());
        $this->assertEquals(true, $contactIdentifier->isActive());
    }

    public function it_returns_contact_identifier_by_value_with_contact()
    {
        $this->addExpectedResponse([
            "value" => "1",
            "name" => 'Piggy',
            "active" => true,
            "contact" => [
                "uuid" => 'uuid'
            ],
        ]);

        $contactIdentifier = $this->mockedClient->contactIdentifiers->get("1");

        $this->assertEquals("1", $contactIdentifier->getValue());
        $this->assertEquals("Piggy", $contactIdentifier->getName());
        $this->assertEquals(true, $contactIdentifier->isActive());
        $this->assertEquals('uuid', $contactIdentifier->getContact()->getUuid());
    }

    /** @test */
    public function it_creates_a_contact_identifier_without_contact()
    {
        $this->addExpectedResponse([
            "value" => "hash123",
            "name" => 'Piggy',
            "active" => true,
            "contact" => null,
        ]);

        $contactIdentifier = $this->mockedClient->contactIdentifiers->create("hash123");

        $this->assertEquals("hash123", $contactIdentifier->getValue());
        $this->assertEquals("Piggy", $contactIdentifier->getName());
        $this->assertEquals(true, $contactIdentifier->isActive());
        $this->assertEquals(null, $contactIdentifier->getContact());
    }

    /** @test */
    public function it_creates_a_contact_identifier_with_contact()
    {
        $this->addExpectedResponse([
            "value" => "hash123",
            "name" => 'Piggy',
            "active" => true,
            "contact" => [
                "uuid" => 'my-uuid',
            ],
        ]);

        $contactIdentifier = $this->mockedClient->contactIdentifiers->create("hash123", 'my-uuid');

        $this->assertEquals("hash123", $contactIdentifier->getValue());
        $this->assertEquals("Piggy", $contactIdentifier->getName());
        $this->assertEquals(true, $contactIdentifier->isActive());
        $this->assertEquals('my-uuid', $contactIdentifier->getContact()->getUuid());
    }

    /** @test */
    public function it_links_contact_uuid_with_contact_identifier()
    {
        $this->addExpectedResponse([
            "value" => "hash123",
            "name" => 'Piggy',
            "active" => true,
            "contact" => [
                "uuid" => 'mijn-uuid',
            ],
        ]);

        $contactIdentifier = $this->mockedClient->contactIdentifiers->link("hash123", "3");

        $this->assertEquals("Piggy", $contactIdentifier->getName());
        $this->assertEquals("hash123", $contactIdentifier->getValue());
        $this->assertEquals(true, $contactIdentifier->isActive());
        $this->assertEquals('mijn-uuid', $contactIdentifier->getContact()->getUuid());

    }
}










