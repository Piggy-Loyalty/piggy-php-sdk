<?php

namespace Piggy\Api\Tests;

use Piggy\Api\Exceptions\MaintenanceModeException;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\OAuthClient;

/**
 * Class OAuthTestCase
 */
class OAuthTestCase extends BaseTestCase
{
    /**
     * @var OAuthClient
     */
    protected $mockedClient;

    protected function setUp(): void
    {
        parent::setUp();

        $oauthClient = new OAuthClient(1, 'secret', $this->httpClient);
        $oauthClient->addHeader('Authorization', 'Bearer token');

        $this->mockedClient = $oauthClient;
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        $this->mockHandler->reset();
    }

    /** @test
     * @throws PiggyRequestException
     */
    public function throws_maintenance_mode_exception()
    {
        $this->addExpectedResponse([], null, 503);
        $this->expectException(MaintenanceModeException::class);
        $this->mockedClient->contacts->get(1);
    }
}
