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
            "uuid" => 1,
            "email" => "new@piggy.nl",
            "prepaid_balance" => [
                "balance_in_cents" => 100
            ]
        ]);
//        $prepaidBalance,
//            $creditBalance,
//            $attributes,
//            $subscriptions,
//            $currentValues

        $contact = $this->mockedClient->contacts->get('123-123');

        $this->assertEquals(1, $contact->getUuId());
        $this->assertEquals("new@piggy.nl", $contact->getEmail());
        $this->assertEquals(1, $contact->getCreditBalance());
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
        $this->assertEquals("new@piggy.nl", $contact->getEmail());
    }

    /**
     * @test
     */
    public function it_returns_contact_by_email()
    {
        $this->addExpectedResponse([
            "uuid" => '§12345678',
            "email" => $contact->getEmail(),
            "prepaid_balance" => [
                "balance_in_cents" => $contact->getPrepaidBalance()->getBalanceInCents(),
            ],
            "credit_balance" => [
                "balance" => $contact->getCreditBalance()->getBalance(),
            ],
            "attributes" => $contact->getAttributes(),
            "current_values" => $contact->getCurrentValues(),
            "subscriptions" => $contact->getSubscriptions(),
        ]);

        $contact = $this->mockedClient->contacts->findOneBy($contact->getEmail());

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
