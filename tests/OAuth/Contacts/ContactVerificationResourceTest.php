<?php

namespace Piggy\Api\Tests\OAuth\Contacts;

use Piggy\Api\Tests\OAuthTestCase;

class ContactVerificationResourceTest extends OAuthTestCase
{
    /**
     * @test
     */
    public function it_sends_a_verification_email()
    {
        $this->addExpectedResponse([
            true,
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

        $data = $this->mockedClient->contactVerification->sendVerificationMail('geenEmail');

        $this->assertEquals(false, $data);
    }

    /**
     * @test
     */
    public function it_verifies_a_login_code()
    {
        $this->addExpectedResponse([
            true,
        ]);

        $data = $this->mockedClient->contactVerification->verifyLoginCode('code', 'test@piggy.nl');

        $this->assertEquals(true, $data);
    }

    /**
     * @test
     */
    public function it_returns_false_when_it_gets_an_exception()
    {
        $this->addExpectedResponse([], [], 400);

        $data = $this->mockedClient->contactVerification->verifyLoginCode('wrong', 'geenEmail');

        $this->assertEquals(false, $data);
    }

    /**
     * @test
     */
    public function it_returns_an_auth_token()
    {
        $this->addExpectedResponse(
            'eyJpdiI6IjduK1pwWFR4WW94S0xUTHRkN2JtUnc9PSIsInZhbHVlIjoibUdVcXQ1T2FxeitYS2Jab0xSNTJ5SllxK1M1bHRBdDZmdjBHcEc2dStFVStFU3JHZ2wzSDd1UUNQai9MMDBqdWo4N1IxdlI0blRPL0J3d1FHTGU1Y05oZmE5eXdMUndnQTdJNFJUOHE1ZUxYYXY2N0UxZTNUNEtCWTZaMU1hZE9uM09FRnpCWjg3OHA2VWZxY0JWUFdsWkcybGhxUkVuQXhDS0JpTk4vVm5vPSIsIm1hYyI6Ijg2OWQ5ZDFhYjhlZmUyYjIxNjE5OTlhMzZkY2Q4NzE0Mjc4ZjFkNmY0ZjMyMDkzZjZjNjNjMGQ2Y2I3NGE0YTUiLCJ0YWciOiIifQ=='
        );

        $authToken = $this->mockedClient->contactVerification->getAuthToken('123');

        $this->assertEquals('eyJpdiI6IjduK1pwWFR4WW94S0xUTHRkN2JtUnc9PSIsInZhbHVlIjoibUdVcXQ1T2FxeitYS2Jab0xSNTJ5SllxK1M1bHRBdDZmdjBHcEc2dStFVStFU3JHZ2wzSDd1UUNQai9MMDBqdWo4N1IxdlI0blRPL0J3d1FHTGU1Y05oZmE5eXdMUndnQTdJNFJUOHE1ZUxYYXY2N0UxZTNUNEtCWTZaMU1hZE9uM09FRnpCWjg3OHA2VWZxY0JWUFdsWkcybGhxUkVuQXhDS0JpTk4vVm5vPSIsIm1hYyI6Ijg2OWQ5ZDFhYjhlZmUyYjIxNjE5OTlhMzZkY2Q4NzE0Mjc4ZjFkNmY0ZjMyMDkzZjZjNjNjMGQ2Y2I3NGE0YTUiLCJ0YWciOiIifQ==', $authToken);
    }
}
