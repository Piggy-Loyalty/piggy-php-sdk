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

        $data = $this->mockedClient->contactVerificationResource->sendVerificationMail("newpiggy@piggy.nl");

        $this->assertEquals(true, $data);
    }

    /**
     * @test
     */
    public function it_returns_false_when_email_is_not_send()
    {
        $this->addExpectedResponse([
            false
        ]);

        $data = $this->mockedClient->contactVerificationResource->sendVerificationMail("");

        $this->assertEquals(false, $data);
    }
}
