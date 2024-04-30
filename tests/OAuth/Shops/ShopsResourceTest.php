<?php

namespace Piggy\Api\Tests\OAuth\Shops;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Tests\OAuthTestCase;

class ShopsResourceTest extends OAuthTestCase
{
    /**
     * @test
     *
     * @throws PiggyRequestException
     */
    public function it_returns_a_list_with_shops()
    {
        $this->addExpectedResponse([
            [
                'uuid' => '123-123',
                'name' => 'Toffe Shop',
            ],
            [
                'uuid' => '123-shop',
                'name' => 'Shop Naam',
            ],
        ]);

        $shop = $this->mockedClient->shops->all();

        $this->assertEquals('123-123', $shop[0]->getUuid());
        $this->assertEquals('Toffe Shop', $shop[0]->getName());
        $this->assertEquals('123-shop', $shop[1]->getUuid());
        $this->assertEquals('Shop Naam', $shop[1]->getName());

    }

    /**
     * @test
     *
     * @throws PiggyRequestException
     */
    public function it_returns_a_shop()
    {
        $this->addExpectedResponse([
            'uuid' => '123-123',
            'name' => 'Toffe Shop',
        ]);

        $shop = $this->mockedClient->shops->get('123-123');

        $this->assertEquals('123-123', $shop->getUuid());
        $this->assertEquals('Toffe Shop', $shop->getName());
    }
}
