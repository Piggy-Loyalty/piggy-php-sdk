<?php

namespace Piggy\Api\Tests\OAuth\Loyalty;

use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Models\Loyalty\CreditBalance;
use Piggy\Api\OAuthClient;
use Piggy\Api\Tests\OAuthTestCase;

/**
 * Class MembersResourceTest
 * @package Piggy\Api\Tests\OAuth\Loyalty
 */
class MembersResourceTest extends OAuthTestCase
{
    /**
     * @test
     * @throws GuzzleException
     * @throws PiggyRequestException
     */
    public function it_returns_the_member_after_creation()
    {
        $this->addExpectedResponse([
            "id" => 1,
            "email" => "new@piggy.nl",
        ]);

        $data = $this->mockedClient->members->create(1, 'new@piggy.nl');

        $this->assertEquals(1, $data->getId());
        $this->assertEquals("new@piggy.nl", $data->getEmail());
    }

    /**
     * @test
     */
    public function it_returns_member_by_email()
    {
        $member = $this->createMember();
        $creditBalance = new CreditBalance($member, 100);

        $this->addExpectedResponse([
            "member" => [
                "id" => $member->getId(),
                "email" => $member->getEmail(),
            ],
            "credit_balance" => [
                "balance" => $creditBalance->getBalance(),
            ],
        ]);

        $data = $this->mockedClient->members->findOneBy(1, $member->getEmail());

        $this->assertEquals($member->getEmail(), $data->getMember()->getEmail());
        $this->assertEquals($creditBalance->getBalance(), $data->getCreditBalance()->getBalance());
    }

    /**
     * @test
     */
    public function it_returns_member_by_id()
    {
        $member = $this->createMember();

        $creditBalance = new CreditBalance($member, 100);
        $this->addExpectedResponse([
            "member" => [
                "id" => $member->getId(),
                "email" => $member->getEmail(),
            ],
            "credit_balance" => [
                "id" => 1,
                "balance" => 100,
            ],
        ]);

        $data = $this->mockedClient->members->findOneBy(1, "piggy@piggy.nl");

        $this->assertEquals($member->getEmail(), $data->getMember()->getEmail());
        $this->assertEquals($creditBalance->getBalance(), $data->getCreditBalance()->getBalance());
    }

    /** @test */
    public function it_creates_and_returns_member()
    {
        $email = "piggy@piggy.nl";

        $this->addExpectedResponse([
            "member" => [
                "id" => 1,
                "email" => $email,
            ],
            "credit_balance" => null,
        ]);

        $data = $this->mockedClient->members->findOrCreate(1, 1, $email);

        $this->assertEquals($email, $data->getMember()->getEmail());
        $this->assertNull($data->getCreditBalance());
    }

    /** @test */
    public function it_returns_member_when_member_exists()
    {
        $lp = $this->createLoyaltyProgram();

        $member = $this->createMember();

        $creditBalance = new CreditBalance($member, 100);
        $this->addExpectedResponse([
            "member" => [
                "id" => $member->getId(),
                "email" => $member->getEmail(),
            ],
            "credit_balance" => [
                "id" => 1,
                "balance" => 100,
            ],
        ]);

        $data = $this->mockedClient->members->findOrCreate($lp->getId(), 1, $member->getEmail());

        $this->assertEquals($member->getEmail(), $data->getMember()->getEmail());
        $this->assertEquals($creditBalance->getBalance(), $data->getCreditBalance()->getBalance());
    }
}
