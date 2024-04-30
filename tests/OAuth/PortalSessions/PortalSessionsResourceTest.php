<?php

namespace Piggy\Api\Tests\OAuth\PortalSessions;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Tests\OAuthTestCase;

/**
 * Class ContactIdentifiersResourceTest
 */
class PortalSessionsResourceTest extends OAuthTestCase
{
    /**
     * @test
     *
     * @throws PiggyRequestException
     */
    public function it_can_create_a_portal_session()
    {
        $this->addExpectedResponse(
            [
                'uuid' => 'd02c7730-a1bb-471d-b293-bdc5add171e5',
                'url' => 'https://api.piggy.eu/portal-sessions?uuid=d02c7730-a1bb-471d-b293-bdc5add171e5',
                'contact' => [
                    'uuid' => '123',
                ],
                'shop' => [
                    'id' => '243',
                    'uuid' => '2222e1242t3324535',
                    'name' => '30MLfd',
                ],
                'created_at' => '2022-06-30T13:29:16+00:00',
            ]
        );

        $portalSessions = $this->mockedClient->portalSessions->create('2222e1242t3324535');

        $this->assertEquals('d02c7730-a1bb-471d-b293-bdc5add171e5', $portalSessions->getUuid());
        $this->assertEquals('https://api.piggy.eu/portal-sessions?uuid=d02c7730-a1bb-471d-b293-bdc5add171e5', $portalSessions->getUrl());
        $this->assertEquals('123', $portalSessions->getContact()->getUuid());
        $this->assertEquals('243', $portalSessions->getShop()->getId());
        $this->assertEquals('2222e1242t3324535', $portalSessions->getShop()->getUuid());
        $this->assertEquals('30MLfd', $portalSessions->getShop()->getName());
        $this->assertEquals('2022-06-30T13:29:16+00:00', $portalSessions->getCreatedAt()->format('c'));

    }

    /**
     * @test
     *
     * @throws PiggyRequestException
     */
    public function it_can_show_a_portal_session()
    {
        $this->addExpectedResponse(
            [
                'uuid' => 'd02c7730-a1bb-471d-b293-bdc5add171e5',
                'url' => 'https://api.piggy.eu/portal-sessions?uuid=d02c7730-a1bb-471d-b293-bdc5add171e5',
                'contact' => [
                    'uuid' => '123',
                ],
                'shop' => [
                    'id' => '243',
                    'uuid' => '2222e1242t3324535',
                    'name' => '30MLfd',
                ],
                'created_at' => '2022-06-30T13:29:16+00:00',
            ]
        );

        $portalSessions = $this->mockedClient->portalSessions->get('d02c7730-a1bb-471d-b293-bdc5add171e5');

        $this->assertEquals('d02c7730-a1bb-471d-b293-bdc5add171e5', $portalSessions->getUuid());
        $this->assertEquals('https://api.piggy.eu/portal-sessions?uuid=d02c7730-a1bb-471d-b293-bdc5add171e5', $portalSessions->getUrl());
        $this->assertEquals('123', $portalSessions->getContact()->getUuid());
        $this->assertEquals('243', $portalSessions->getShop()->getId());
        $this->assertEquals('2222e1242t3324535', $portalSessions->getShop()->getUuid());
        $this->assertEquals('30MLfd', $portalSessions->getShop()->getName());
        $this->assertEquals('2022-06-30T13:29:16+00:00', $portalSessions->getCreatedAt()->format('c'));
    }
}
