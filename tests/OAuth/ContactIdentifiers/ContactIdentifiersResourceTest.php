<?php

namespace Piggy\Api\Tests\OAuth\ContactIdentifiers;

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

        $this->assertEquals("1", $contactIdentifier->getValue());
        $this->assertEquals("Piggy", $contactIdentifier->getName());
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
}
