<?php

namespace Piggy\Api\Tests\OAuth\Contacts;

use Piggy\Api\Tests\OAuthTestCase;

/**
 * Class ContactVerificationResourceTest
 * @package Piggy\Api\Tests\OAuth
 */
class ContactVerificationResourceTest extends OAuthTestCase
{
    /**
     * @test
     */
    public function it_sends_a_verification_email()
    {
        $this->addExpectedResponse([
            true
        ]);

        $data = $this->mockedClient->contactVerification->sendVerificationMail('test@piggy.nl');

        $this->assertEquals(true, $data);
    }

    /**
     * @test
     */
    public function it_returns_false_when_email_is_not_send()
    {
        $this->addExpectedResponse([], [], 400);

        $data = $this->mockedClient->contactVerification->sendVerificationMail("geenEmail");

        $this->assertEquals(false, $data);
    }

    /**
     * @test
     */
    public function it_verifies_a_login_code()
    {
        $this->addExpectedResponse([
            true
        ]);

        $data = $this->mockedClient->contactVerification->verifyLoginCode('code', "test@piggy.nl");

        $this->assertEquals(true, $data);
    }

    /**
     * @test
     */
    public function it_returns_false_when_it_gets_an_exception()
    {
        $this->addExpectedResponse([], [], 400);

        $data = $this->mockedClient->contactVerification->verifyLoginCode('wrong', "geenEmail");

        $this->assertEquals(false, $data);
    }
}
