<?php

namespace Piggy\Api\Tests\OAuth\Contacts;

use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\Exceptions\MaintenanceModeException;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Tests\OAuthTestCase;

/**
 * Class ContactsResourceTest
 * @package Piggy\Api\Tests\OAuth\Loyalty
 */
class ContactsResourceTest extends OAuthTestCase
{
    /**
     * @test
     * @throws GuzzleException
     * @throws PiggyRequestException
     * @throws MaintenanceModeException
     */
    public function it_gets_a_contact()
    {
        $this->addExpectedResponse([
            "uuid" => 'uuid-piggy-12',
            "email" => "new@piggy.nl",
            "prepaid_balance" => [
                "balance_in_cents" => 100
            ],
            "current_values" => [
                "age" => 20,
                "city" => "Maarssen"
            ],
            "credit_balance" => [
                "balance" => 99
            ],
            "subscriptions" => [[
                "is_subscribed" => true,
                "status" => "SUBSCRIBED",
                "subscription_type" => [
                    "uuid" => "23-23-pi-gg-y",
                    "name" => "Functional",
                    "description" => "Functional emails",
                    "active" => true,
                    "strategy" => "OPT_OUT"
                ]
            ]],
            "attributes" => [[
                "value" => "Henk",
                "attribute" => [
                    "name" => "firstName",
                    "label" => "Nombre",
                    "description" => "Voornaam",
                    "type" => "text",
                    "is_soft_read_only" => false,
                    "is_hard_read_only" => false,
                    "is_piggy_defined" => true,
                    "options" => []
                ]
            ]]
        ]);

        $contact = $this->mockedClient->contacts->get('uuid-piggy-12');

        $this->assertEquals("uuid-piggy-12", $contact->getUuId());
        $this->assertEquals("new@piggy.nl", $contact->getEmail());
        $this->assertEquals(100, $contact->getPrepaidBalance()->getBalanceInCents());
        $this->assertEquals([
            'age' => 20,
            'city' => "Maarssen"
        ], $contact->getCurrentValues());
        $this->assertEquals(99, $contact->getCreditBalance()->getBalance());
        $this->assertEquals("SUBSCRIBED", $contact->getSubscriptions()[0]->getStatus());
        $this->assertEquals(true, $contact->getSubscriptions()[0]->isSubscribed());
        $this->assertEquals('23-23-pi-gg-y', $contact->getSubscriptions()[0]->getSubscriptionType()->getUuid());
        $this->assertEquals('Functional', $contact->getSubscriptions()[0]->getSubscriptionType()->getName());
        $this->assertEquals('Functional emails', $contact->getSubscriptions()[0]->getSubscriptionType()->getDescription());
        $this->assertEquals(true, $contact->getSubscriptions()[0]->getSubscriptionType()->isActive());
        $this->assertEquals('OPT_OUT', $contact->getSubscriptions()[0]->getSubscriptionType()->getStrategy());
        $this->assertEquals("Henk", $contact->getAttributes()[0]->getValue());
        $this->assertEquals("firstName", $contact->getAttributes()[0]->getAttribute()->getName());
        $this->assertEquals("Nombre", $contact->getAttributes()[0]->getAttribute()->getLabel());
        $this->assertEquals("Voornaam", $contact->getAttributes()[0]->getAttribute()->getDescription());
        $this->assertEquals("text", $contact->getAttributes()[0]->getAttribute()->getType());
        $this->assertEquals("text", $contact->getAttributes()[0]->getAttribute()->getFieldType());
        $this->assertEquals(false, $contact->getAttributes()[0]->getAttribute()->getIsSoftReadOnly());
        $this->assertEquals(false, $contact->getAttributes()[0]->getAttribute()->getIsHardReadOnly());
        $this->assertEquals(true, $contact->getAttributes()[0]->getAttribute()->getIsPiggyDefined());

        $this->assertEquals([], $contact->getAttributes()[0]->getAttribute()->getOptions());
    }

    /**
     * @test
     * @throws PiggyRequestException
     */
    public function it_returns_the_contact_after_creation()
    {
        $this->addExpectedResponse([
            "uuid" => '123-123',
        ]);

        $contact = $this->mockedClient->contacts->create("new@piggy.nl");

        $this->assertEquals('123-123', $contact->getUuId());
    }

    /**
     * @test
     * @throws PiggyRequestException
     */
    public function it_finds_contact_by_email()
    {
        $this->addExpectedResponse([
            "uuid" => '§12345678',
            "email" => 'hello@piggy.nl',
            "prepaid_balance" => [
                "balance_in_cents" => 12,
            ],
            "credit_balance" => [
                "balance" => 13,
            ],
            "attributes" => [],
            "current_values" => ['hallo' => '1'],  //can't be an empty array, should this be possible?
            "subscriptions" => [],
        ]);

        $contact = $this->mockedClient->contacts->findOneBy("hello@piggy.nl");

        $this->assertEquals('§12345678', $contact->getUuid());
    }

    /** @test
     * @throws PiggyRequestException
     */
    public function it_creates_a_contact_anonymously()
    {
        $this->addExpectedResponse([
            "uuid" => '123-123',
        ]);

        $data = $this->mockedClient->contacts->createAnonymously();

        $this->assertEquals("123-123", $data->getUuid());
    }

    /** @test
     * @throws PiggyRequestException
     */
    public function it_creates_and_returns_contact()
    {

        $this->addExpectedResponse([
            "uuid" => 'uuid-piggy-12',
            "email" => "new@piggy.nl",
            "prepaid_balance" => [
                "balance_in_cents" => 100
            ],
            "current_values" => [
                "age" => 20,
                "city" => "Maarssen"
            ],
            "credit_balance" => [
                "balance" => 99
            ],
            "subscriptions" => [[
                "is_subscribed" => true,
                "status" => "SUBSCRIBED",
                "subscription_type" => [
                    "uuid" => "23-23-pi-gg-y",
                    "name" => "Functional",
                    "description" => "Functional emails",
                    "active" => true,
                    "strategy" => "OPT_OUT"
                ]
            ]],
            "attributes" => [[
                "value" => "Henk",
                "attribute" => [
                    "name" => "firstName",
                    "label" => "Nombre",
                    "description" => "Voornaam",
                    "type" => "text",
                    "field_type" => "text",
                    "is_soft_read_only" => false,
                    "is_hard_read_only" => false,
                    "is_piggy_defined" => true,
                    "options" => []
                ]
            ]]
        ]);

        $data = $this->mockedClient->contacts->findOrCreate("new@piggy.nl");

        $this->assertEquals("new@piggy.nl", $data->getEmail());
    }

    /** @test
     * @throws PiggyRequestException
     */
    public function it_updates_a_contact()
    {
        $this->addExpectedResponse([
            "uuid" => 'uuid-piggy-12',
            "email" => "new@piggy.nl",
            "prepaid_balance" => [
                "balance_in_cents" => 100
            ],
            "current_values" => [
                "age" => 20,
                "city" => "Maarssen"
            ],
            "credit_balance" => [
                "balance" => 99
            ],
            "subscriptions" => [[
                "is_subscribed" => true,
                "status" => "SUBSCRIBED",
                "subscription_type" => [
                    "uuid" => "23-23-pi-gg-y",
                    "name" => "Functional",
                    "description" => "Functional emails",
                    "active" => true,
                    "strategy" => "OPT_OUT"
                ]
            ]],
            "attributes" => [[
                "value" => "Henk",
                "attribute" => [
                    "name" => "firstName",
                    "label" => "Nombre",
                    "description" => "Voornaam",
                    "type" => "text",
                    "field_type" => "text",
                    "is_soft_read_only" => false,
                    "is_hard_read_only" => false,
                    "is_piggy_defined" => true,
                    "options" => []
                ]
            ]]
        ]);

        $contact = $this->mockedClient->contacts->update("uuid-piggy-12", [
                "firstName" => "Peter",
                "lastName" => "Pan"]
        );

        $this->assertEquals("uuid-piggy-12", $contact->getUuId());
        $this->assertEquals("Henk", $contact->getAttributes()[0]->getValue());

    }

    /**
     * @test
     * @throws PiggyRequestException
     */
    public function it_returns_a_prepaid_balance()
    {
        $this->addExpectedResponse([
            "balance_in_cents" => 10
        ]);

        $prepaidBalance = $this->mockedClient->contacts->getPrepaidBalance('123-123');

        $this->assertEquals(10, $prepaidBalance->getBalanceInCents());
    }

    /**
     * @test
     * @throws PiggyRequestException
     */
    public function it_returns_a_credit_balance()
    {
        $this->addExpectedResponse([
            "balance" => 10
        ]);

        $prepaidBalance = $this->mockedClient->contacts->getCreditBalance('123-123');

        $this->assertEquals(10, $prepaidBalance->getBalance());
    }

    /**
     * @test
     * @throws PiggyRequestException
     */
    public function it_creates_a_contact_async()
    {
        $this->addExpectedResponse([
            "uuid" => '7306f0ac-008a-4ab6-b10f-2e5a25c56829',
        ]);

        $contact = $this->mockedClient->contacts->createAsync("new_contact@piggy.eu");

        $this->assertEquals('7306f0ac-008a-4ab6-b10f-2e5a25c56829', $contact->getUuId());
    }

    /**
     * @test
     * @throws PiggyRequestException
     */
    public function it_finds_or_creates_a_contact_async()
    {
        $this->addExpectedResponse([
            "uuid" => '7306f0ac-008a-4ab6-b10f-2e5a25c56829',
        ]);

        $contact = $this->mockedClient->contacts->findOrCreateAsync("new_contact@piggy.eu");

        $this->assertEquals('7306f0ac-008a-4ab6-b10f-2e5a25c56829', $contact->getUuId());
    }

    /**
     * @test
     * @throws PiggyRequestException
     */
    public function it_deletes_a_contact()
    {
        $this->addExpectedResponse(null);

        $contact = $this->mockedClient->contacts->destroy("aa4e7ce5-8505-4bc9-a1d3-d4676bdd4410", "GDPR");

        $this->assertNull($contact);
    }

    /**
     * @test
     * @throws PiggyRequestException
     */
    public function it_can_claim_anonymously()
    {
        $this->addExpectedResponse([
            "uuid" => '7306f0ac-008a-4ab6-b10f-2e5a25c56829',
            "email" => "new_contact@piggy.eu",
        ]);

        $contact = $this->mockedClient->contacts->claimAnonymousContact("7306f0ac-008a-4ab6-b10f-2e5a25c56829", "new_contact@piggy.eu");

        $this->assertEquals("7306f0ac-008a-4ab6-b10f-2e5a25c56829", $contact->getUuid());
        $this->assertEquals("new_contact@piggy.eu", $contact->getEmail());
    }
}