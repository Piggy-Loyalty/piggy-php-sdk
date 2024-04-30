<?php

namespace Piggy\Api\Tests\OAuth\Automations;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Tests\OAuthTestCase;

/**
 * Class AutomationsResourceTest
 */
class AutomationsResourceTest extends OAuthTestCase
{
    /**
     * @test
     *
     * @throws PiggyRequestException
     */
    public function it_returns_contact_identifier_by_value()
    {
        $this->addExpectedResponse([
            [
                'event' => 'credit_reception_created',
                'name' => 'Stuur een e-mail wanneer een contactpersoon voor het eerst deelneemt aan uw loyaliteitsprogramma.',
                'status' => 'inactive',
                'created_at' => '2022-01-26T14:59:35+00:00',
                'updated_at' => '2022-01-26T14:59:35+00:00',
            ],
        ]);

        $automations = $this->mockedClient->automations->list();

        $this->assertEquals('credit_reception_created', $automations[0]->getEvent());
        $this->assertEquals('Stuur een e-mail wanneer een contactpersoon voor het eerst deelneemt aan uw loyaliteitsprogramma.', $automations[0]->getName());
        $this->assertEquals('inactive', $automations[0]->getStatus());
        $this->assertEquals('2022-01-26T14:59:35+00:00', $automations[0]->getCreatedAt()->format('c'));
        $this->assertEquals('2022-01-26T14:59:35+00:00', $automations[0]->getUpdatedAt()->format('c'));
    }

    /**
     * @test
     *
     * @throws PiggyRequestException
     */
    public function it_creates_an_automations_run()
    {
        $this->addExpectedResponse([]);

        $automations = $this->mockedClient->automations->create('123-123', '123-321');

        $this->assertEquals([], $automations);
    }
}
