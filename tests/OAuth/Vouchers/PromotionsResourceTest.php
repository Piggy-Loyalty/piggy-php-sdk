<?php

namespace Piggy\Api\Tests\OAuth\Vouchers;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Tests\OAuthTestCase;

class PromotionsResourceTest extends OAuthTestCase
{
    /**
     * @test
     */
    public function it_returns_promotion_after_creation()
    {
        $this->addExpectedResponse([
            'uuid' => '1234-abcd-5678-efgh',
            'name' => 'Free Pizza',
            'description' => 'Get your free pizza slice!',
            'type' => 'SINGLE_USE',
            'redemptions_per_voucher' => 1
        ]);

        $promotion = $this->mockedClient->promotion->create('Free Pizza', 'Get your free pizza slice!', 'SINGLE_USE', 1);

        $this->assertEquals('1234-abcd-5678-efgh', $promotion->getUuid());
        $this->assertEquals('Free Pizza', $promotion->getName());
        $this->assertEquals('Get your free pizza slice!', $promotion->getDescription());
        $this->assertEquals('SINGLE_USE', $promotion->getType());
        $this->assertEquals(1, $promotion->getRedemptionsPerVoucher());
    }

    /**
     * @test
     *
     * @throws PiggyRequestException
     */
    public function it_returns_a_list_of_promotions()
    {
        $this->addExpectedResponse([
            [
                'uuid' => '1234-abcd-5678-efgh',
                'name' => 'Free Pizza',
                'description' => 'Get your free pizza slice!',
                'type' => 'SINGLE_USE',
                'redemptions_per_voucher' => 1,
                'voucher_limit' => 0,
                'limit_per_contact' => null,
                'expiration_duration' => null,
            ],
            [
                'uuid' => '9876-ijkl-5432-mnop',
                'name' => 'Extra mozzarella',
                'description' => 'Get an extra layer of cheese on your pizza!',
                'type' => 'SINGLE_USE',
                'redemptions_per_voucher' => 1,
                'voucher_limit' => 0,
                'limit_per_contact' => null,
                'expiration_duration' => null,
            ],
        ]
        );

        $promotions = $this->mockedClient->promotion->list();

        $this->assertEquals('1234-abcd-5678-efgh', $promotions[0]->getUuid());
        $this->assertEquals('Free Pizza', $promotions[0]->getName());
        $this->assertEquals('Get your free pizza slice!', $promotions[0]->getDescription());
        $this->assertEquals('SINGLE_USE', $promotions[0]->getType());
        $this->assertEquals(1, $promotions[0]->getRedemptionsPerVoucher());
        $this->assertEquals(0, $promotions[0]->getVoucherLimit());

        $this->assertEquals('9876-ijkl-5432-mnop', $promotions[1]->getUuid());
        $this->assertEquals('Extra mozzarella', $promotions[1]->getName());
        $this->assertEquals('SINGLE_USE', $promotions[0]->getType());
        $this->assertEquals(1, $promotions[0]->getRedemptionsPerVoucher());
        $this->assertEquals('Get an extra layer of cheese on your pizza!', $promotions[1]->getDescription());
        $this->assertEquals(0, $promotions[1]->getVoucherLimit());
    }

    /**
     * @test
     */
    public function it_can_find_a_promotion_by_uuid()
    {
        $this->addExpectedResponse([
            'uuid' => '1234-abcd-5678-efgh',
            'name' => 'Free Pizza',
            'description' => 'Get your free pizza slice!',
            'type' => 'SINGLE_USE',
            'redemptions_per_voucher' => 1,
        ]);

        $promotion = $this->mockedClient->promotion->findBy('1234-abcd-5678-efgh');

        $this->assertEquals('1234-abcd-5678-efgh', $promotion->getUuid());
        $this->assertEquals('Free Pizza', $promotion->getName());
        $this->assertEquals('Get your free pizza slice!', $promotion->getDescription());
        $this->assertEquals('SINGLE_USE', $promotion->getType());
        $this->assertEquals(1, $promotion->getRedemptionsPerVoucher());
    }
}
