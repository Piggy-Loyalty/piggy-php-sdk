<?php

namespace Piggy\Api\Tests\OAuth\Forms;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Tests\OAuthTestCase;

class FormResourceTest extends OAuthTestCase
{
    /** @test
     * @throws PiggyRequestException
     */
    public function it_returns_a_list_of_forms()
    {
        $this->addExpectedResponse([
            [
                'name' => 'New private form',
                'status' => 'PUBLISHED',
                'uuid' => '7dc3f9be-5ce0-4d5a-bc82-4a1a092d21ab',
                'url' => 'http://something.eu/forms/7dc3f9be-5ce0-4d5a-bc82-4a1a092d21ab',
                'type' => 'PRIVATE',
            ],
            [
                'name' => 'New private form 2',
                'status' => 'DRAFT',
                'uuid' => '45cd914e-96f9-4749-80cb-e5950d08327a',
                'url' => 'http://something.eu/forms/7dc3f9be-5ce0-4d5a-bc82-4a1a092d21ab',
                'type' => 'PUBLIC',
            ],
        ]);

        $forms = $this->mockedClient->forms->list();

        $this->assertEquals('New private form', $forms[0]->getName());
        $this->assertEquals('PUBLISHED', $forms[0]->getStatus());
        $this->assertEquals('7dc3f9be-5ce0-4d5a-bc82-4a1a092d21ab', $forms[0]->getUuid());
        $this->assertEquals('http://something.eu/forms/7dc3f9be-5ce0-4d5a-bc82-4a1a092d21ab', $forms[0]->getUrl());
        $this->assertEquals('PRIVATE', $forms[0]->getType());

        $this->assertEquals('New private form 2', $forms[1]->getName());
        $this->assertEquals('DRAFT', $forms[1]->getStatus());
        $this->assertEquals('45cd914e-96f9-4749-80cb-e5950d08327a', $forms[1]->getUuid());
        $this->assertEquals('http://something.eu/forms/7dc3f9be-5ce0-4d5a-bc82-4a1a092d21ab', $forms[1]->getUrl());
        $this->assertEquals('PUBLIC', $forms[1]->getType());
    }
}
