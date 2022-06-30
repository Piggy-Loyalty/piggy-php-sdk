<?php

namespace Piggy\Api\Tests\OAuth\Contacts;

use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Models\Contacts\Attribute;
use Piggy\Api\Models\Contacts\ContactAttribute;
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
                    "id" => 1,
                    "uuid" => "23-23-pi-gg-y",
                    "name" => "Functional",
                    "description" => "Functional emails",
                    "active" => true,
                    "strategy" => "OPT_OUT"
                ]
            ]],
            new ContactAttribute(
                "de Vries",
                new Attribute(
                    "name",
                    "label",
                    "E-mail",
                    "email",
                    "email",
                    false,
                    false,
                    true,
                    []
                )
            )
//            "attributes" => [[
//                "value" => "Henk",
//                "attribute" => [
//                    "name" => "firstName",
//                    "label" => "Nombre",
//                    "description" => "Voornaam",
//                    "type" => "text",
//                    "field_type" => "text",
//                    "is_soft_read_only" => false,
//                    "is_hard_read_only" => false,
//                    "is_piggy_defined" => true,
//                    "options" => []
//                ]
//            ]]
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
//        $this->assertEquals([
//            "is_subscribed" => true,
//            "status" => "SUBSCRIBED",
//            "subscription_type" => [
//                "id" => 1,
//                "uuid" => "23-23-pi-gg-y",
//                "name" => "Functional",
//                "description" => "Functional emails",
//                "active" => true,
//                "strategy" => "OPT_OUT"
//            ]
//        ], $contact->getSubscriptions());
        $this->assertEquals(new ContactAttribute(
            "de Vries",
            new Attribute(
                "name",
                "label",
                "E-mail",
                "email",
                "email",
                false,
                false,
                true,
                []
            )
        ), $contact->getAttributes());

        //        $prepaidBalance,
//            $creditBalance,
//            $attributes,
//            $subscriptions,
//            $currentValues
    }

    /**
     * @test
     * @throws GuzzleException
     * @throws PiggyRequestException
     */
    public function it_returns_the_contact_after_creation()
    {
        $this->addExpectedResponse([
            "uuid" => 1,
            "email" => "new@piggy.nl",
        ]);

        $contact = $this->mockedClient->contacts->create("new@piggy.nl");

        $this->assertEquals(1, $contact->getUuId());
    }

    /**
     * @test
     */
    public function it_returns_contact_by_email()
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
            "attributes" =>[],
            "current_values" => [],
            "subscriptions" =>[],
        ]);

        $contact = $this->mockedClient->contacts->findOneBy("hello@piggy.nl");

        $this->assertEquals($contact->getUuId(), '§12345678');
//        $this->assertEquals($contact->getEmail(), $data->getEmail());
//        $this->assertEquals($contact->getPrepaidBalance(), $data->getPrepaidBalance());
//        $this->assertEquals($contact->getCreditBalance(), $data->getCreditBalance());
//        $this->assertEquals($contact->getAttributes(), $data->getAttributes());
//        $this->assertEquals($contact->getCurrentValues(), $data->getCurrentValues());
//        $this->assertEquals($contact->getSubscriptions(), $data->getSubscriptions());
    }

    /** @test */
    public function it_creates_and_returns_contact()
    {
        $email = "piggy@piggy.nl";

        $this->addExpectedResponse([
            "uuid" => 1,
            "email" => $email,
            "credit_balance" => null,
            "prepaid_balance" => null,
            "attributes" => null,
            "current_values" => null,
            "subscriptions" => null,
        ]);

        $data = $this->mockedClient->contacts->findOrCreate($email);

        $this->assertEquals($email, $data->getEmail());
    }

    /** @test */
    public function it_updates_a_contact()
    {
        $attributes = [
            new ContactAttribute(
                "Peter",
                new Attribute(
                    "name",
                    "label",
                    "E-mail",
                    "email",
                    "email",
                    false,
                    false,
                    true,
                    []
                )
            ),
            new ContactAttribute(
                "de Vries",
                new Attribute(
                    "name",
                    "label",
                    "E-mail",
                    "email",
                    "email",
                    false,
                    false,
                    true,
                    []
                )
            )
        ];

        $this->addExpectedResponse([
            "uuid" => 1,
            "email" => "",
            "credit_balance" => null,
            "prepaid_balance" => null,
            "attributes" => $attributes,
            "current_values" => null,
            "subscriptions" => null,
        ]);

        $data = $this->mockedClient->contacts->update("1", [
                "firstName" => "Peter",
                "lastName" => "De Vries"]
        );

        $this->assertEquals("1", $data->getUuId());
        $this->assertEquals($attributes, $data->getAttributes());
    }
}
