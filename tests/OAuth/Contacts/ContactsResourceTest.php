<?php

namespace Piggy\Api\Tests\OAuth\Contacts;

use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Models\Contacts\PrepaidBalance;
use Piggy\Api\Models\Loyalty\CreditBalance;
use Piggy\Api\OAuthClient;
use Piggy\Api\Tests\OAuthTestCase;

/**
 * Class MembersResourceTest
 * @package Piggy\Api\Tests\OAuth\Loyalty
 */
class ContactsResourceTest extends OAuthTestCase
{
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
            "prepaid_balance" => null,
            "attributes" => null,
            "credit_balance" => null,
            "current_values" => null,
            "subscriptions" => null,
        ]);

        $data = $this->mockedClient->contacts->create("new@piggy.nl");

        $this->assertEquals(1, $data->getUuId());
        $this->assertEquals("new@piggy.nl", $data->getEmail());
    }

    /**
     * @test
     */
    public function it_returns_contact_by_email()
    {
        $contact = $this->createContact();

        $this->addExpectedResponse([
            "uuid" => $contact->getUuId(),
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

        $data = $this->mockedClient->contacts->findOneBy($contact->getEmail());

        $this->assertEquals($contact->getEmail(), $data->getEmail());
        $this->assertEquals($contact->getUuId(), $data->getUuId());
        $this->assertEquals($contact->getPrepaidBalance(), $data->getPrepaidBalance());
        $this->assertEquals($contact->getCreditBalance(), $data->getCreditBalance());
        $this->assertEquals($contact->getAttributes(), $data->getAttributes());
        $this->assertEquals($contact->getCurrentValues(), $data->getCurrentValues());
        $this->assertEquals($contact->getSubscriptions(), $data->getSubscriptions());
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

//    /** @test */
//    public function it_returns_contact_when_contact_exists()
//    {
//        $lp = $this->createLoyaltyProgram();
//
//        $contact = $this->createContact();
//
//        $this->addExpectedResponse([
//            "contact" => [
//                "id" => $contact->getId(),
//                "email" => $contact->getEmail(),
//            ],
//            "credit_balance" => [
//                "id" => 1,
//                "balance" => 100,
//            ],
//        ]);
//
//        $data = $this->mockedClient->contacts->findOrCreate($lp->getId(), 1, $contact->getEmail());
//
//        $this->assertEquals($contact->getEmail(), $data->getEmail());
//        $this->assertEquals($creditBalance->getBalance(), $data->getCreditBalance()->getBalance());
//    }
}
