<?php

namespace Piggy\Api\Tests\OAuth\Vouchers;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Tests\OAuthTestCase;

class VoucherResourceTest extends OAuthTestCase
{
    /** @test
     * @throws PiggyRequestException
     */
    public function it_creates_a_voucher()
    {
        $this->addExpectedResponse(
            [
                'uuid' => 'bbe97f73-f482-4dff-bbb3-cba6d63e139b',
                'code' => 'EXAMPLE-CODE-123456',
                'status' => 'ACTIVE',
                'name' => 'Gratis Pizza',
                'description' => 'Lekker gratis pizza',
                'activation_date' => '2023-12-10T10:00:00+00:00',
                'expiration_date' => '2023-12-12T10:00:00+00:00',
                'redeemed_at' => null,
                'is_redeemed' => false,
                'promotion' => [
                    'uuid' => '89da4cc4-1d51-4041-b829-6225fcdef11d',
                    'name' => 'Gratis Pizza',
                    'description' => 'Lekker gratis pizza',
                    'type' => 'SINGLE_USE',
                    'redemptions_per_voucher' => 1,
                ],
            ]
        );

        $voucher = $this->mockedClient->voucher->create('89da4cc4-1d51-4041-b829-6225fcdef11d');

        $this->assertEquals('bbe97f73-f482-4dff-bbb3-cba6d63e139b', $voucher->getUuid());
        $this->assertEquals('EXAMPLE-CODE-123456', $voucher->getCode());
        $this->assertEquals('ACTIVE', $voucher->getStatus());
        $this->assertEquals('Gratis Pizza', $voucher->getPromotion()->getName());
        $this->assertEquals('Lekker gratis pizza', $voucher->getPromotion()->getDescription());
        $this->assertEquals('2023-12-10T10:00:00+00:00', $voucher->getActivationDate()->format('c'));
        $this->assertEquals('2023-12-12T10:00:00+00:00', $voucher->getExpirationDate()->format('c'));
        $this->assertFalse($voucher->isRedeemed());
        $this->assertEquals('89da4cc4-1d51-4041-b829-6225fcdef11d', $voucher->getPromotion()->getUuid());
    }

    /** @test
     * @throws PiggyRequestException
     */
    public function it_can_create_vouchers_in_a_batch()
    {
        $this->addExpectedResponse(
            [
                'Voucher generation successfully started in background.',
            ]
        );

        $responseMessage = $this->mockedClient->voucher->batch('89da4cc4-1d51-4041-b829-6225fcdef11d', 10);

        $this->assertEquals('Voucher generation successfully started in background.', $responseMessage);
    }

    /** @test
     * @throws PiggyRequestException
     */
    public function it_returns_a_list_of_vouchers()
    {
        $this->addExpectedResponse(
            [
                [
                    'uuid' => 'bbe97f73-f482-4dff-bbb3-cba6d63e139b',
                    'code' => 'EXAMPLE-CODE-123456',
                    'status' => 'ACTIVE',
                    'name' => 'Gratis Pizza',
                    'description' => 'Lekker gratis pizza',
                    'activation_date' => '2023-12-10T10:00:00+00:00',
                    'expiration_date' => '2023-12-12T10:00:00+00:00',
                    'redeemed_at' => null,
                    'is_redeemed' => false,
                    'promotion' => [
                        'uuid' => '89da4cc4-1d51-4041-b829-6225fcdef11d',
                        'name' => 'Gratis Pizza',
                        'description' => 'Lekker gratis pizza',
                        'type' => 'SINGLE_USE',
                        'redemptions_per_voucher' => 1,
                    ],
                ],
                [
                    'uuid' => '123123123123123123',
                    'code' => 'EXAMPLE-CODE-7890',
                    'status' => 'ACTIVE',
                    'name' => 'Gratis Pizza',
                    'description' => 'Lekker gratis pizza',
                    'activation_date' => '2023-12-10T10:00:00+00:00',
                    'expiration_date' => '2023-12-12T10:00:00+00:00',
                    'redeemed_at' => null,
                    'is_redeemed' => false,
                    'promotion' => [
                        'uuid' => '89da4cc4-1d51-4041-b829-6225fcdef11d',
                        'name' => 'Gratis Pizza',
                        'description' => 'Lekker gratis pizza',
                        'type' => 'SINGLE_USE',
                        'redemptions_per_voucher' => 1,
                    ],
                ],
            ]
        );

        $vouchers = $this->mockedClient->voucher->list();

        $this->assertEquals('bbe97f73-f482-4dff-bbb3-cba6d63e139b', $vouchers[0]->getUuid());
        $this->assertEquals('EXAMPLE-CODE-123456', $vouchers[0]->getCode());
        $this->assertEquals('ACTIVE', $vouchers[0]->getStatus());
        $this->assertEquals('Gratis Pizza', $vouchers[0]->getPromotion()->getName());
        $this->assertEquals('Lekker gratis pizza', $vouchers[0]->getPromotion()->getDescription());
        $this->assertEquals('2023-12-10T10:00:00+00:00', $vouchers[0]->getActivationDate()->format('c'));
        $this->assertEquals('2023-12-12T10:00:00+00:00', $vouchers[0]->getExpirationDate()->format('c'));
        $this->assertFalse($vouchers[0]->isRedeemed());
        $this->assertEquals('89da4cc4-1d51-4041-b829-6225fcdef11d', $vouchers[0]->getPromotion()->getUuid());

        $this->assertEquals('123123123123123123', $vouchers[1]->getUuid());
        $this->assertEquals('EXAMPLE-CODE-7890', $vouchers[1]->getCode());
        $this->assertEquals('ACTIVE', $vouchers[1]->getStatus());
        $this->assertEquals('Gratis Pizza', $vouchers[1]->getPromotion()->getName());
        $this->assertEquals('Lekker gratis pizza', $vouchers[1]->getPromotion()->getDescription());
        $this->assertEquals('2023-12-10T10:00:00+00:00', $vouchers[1]->getActivationDate()->format('c'));
        $this->assertEquals('2023-12-12T10:00:00+00:00', $vouchers[1]->getExpirationDate()->format('c'));
        $this->assertFalse($vouchers[1]->isRedeemed());
        $this->assertEquals('89da4cc4-1d51-4041-b829-6225fcdef11d', $vouchers[1]->getPromotion()->getUuid());
    }

    /** @test
     * @throws PiggyRequestException
     */
    public function it_finds_a_voucher_by_code()
    {
        $this->addExpectedResponse(
            [
                'uuid' => 'bbe97f73-f482-4dff-bbb3-cba6d63e139b',
                'code' => 'EXAMPLE-CODE-123456',
                'status' => 'ACTIVE',
                'name' => 'Gratis Pizza',
                'description' => 'Lekker gratis pizza',
                'activation_date' => '2023-12-10T10:00:00+00:00',
                'expiration_date' => '2023-12-12T10:00:00+00:00',
                'redeemed_at' => null,
                'is_redeemed' => false,
                'promotion' => [
                    'uuid' => '89da4cc4-1d51-4041-b829-6225fcdef11d',
                    'name' => 'Gratis Pizza',
                    'description' => 'Lekker gratis pizza',
                    'type' => 'SINGLE_USE',
                    'redemptions_per_voucher' => 1,
                ],
            ]
        );

        $voucher = $this->mockedClient->voucher->findByCode('EXAMPLE-CODE-123456');

        $this->assertEquals('bbe97f73-f482-4dff-bbb3-cba6d63e139b', $voucher->getUuid());
        $this->assertEquals('EXAMPLE-CODE-123456', $voucher->getCode());
        $this->assertEquals('ACTIVE', $voucher->getStatus());
        $this->assertEquals('Gratis Pizza', $voucher->getPromotion()->getName());
        $this->assertEquals('Lekker gratis pizza', $voucher->getPromotion()->getDescription());
        $this->assertEquals('2023-12-10T10:00:00+00:00', $voucher->getActivationDate()->format('c'));
        $this->assertEquals('2023-12-12T10:00:00+00:00', $voucher->getExpirationDate()->format('c'));
        $this->assertFalse($voucher->isRedeemed());
        $this->assertEquals('89da4cc4-1d51-4041-b829-6225fcdef11d', $voucher->getPromotion()->getUuid());
    }

    /** @test
     * @throws PiggyRequestException
     */
    public function it_can_redeem_a_voucher_that_is_already_linked_to_a_contact()
    {
        $this->addExpectedResponse(
            [
                'uuid' => 'bbe97f73-f482-4dff-bbb3-cba6d63e139b',
                'code' => 'EXAMPLE-CODE-123456',
                'status' => 'REDEEMED',
                'name' => 'Gratis Pizza',
                'description' => 'Lekker gratis pizza',
                'activation_date' => '2023-12-10T10:00:00+00:00',
                'expiration_date' => '2023-12-12T10:00:00+00:00',
                'redeemed_at' => '2023-10-19T07:38:37+00:00',
                'is_redeemed' => true,
                'promotion' => [
                    'uuid' => '89da4cc4-1d51-4041-b829-6225fcdef11d',
                    'name' => 'Gratis Pizza',
                    'description' => 'Lekker gratis pizza',
                    'type' => 'SINGLE_USE',
                    'redemptions_per_voucher' => 1,
                ],
                'contact' => [
                    'uuid' => '123',
                ],
            ]
        );

        $voucher = $this->mockedClient->voucher->redeem('EXAMPLE-CODE-123456');

        $this->assertEquals('bbe97f73-f482-4dff-bbb3-cba6d63e139b', $voucher->getUuid());
        $this->assertEquals('EXAMPLE-CODE-123456', $voucher->getCode());
        $this->assertEquals('REDEEMED', $voucher->getStatus());
        $this->assertEquals('Gratis Pizza', $voucher->getPromotion()->getName());
        $this->assertEquals('Lekker gratis pizza', $voucher->getPromotion()->getDescription());
        $this->assertEquals('2023-12-10T10:00:00+00:00', $voucher->getActivationDate()->format('c'));
        $this->assertEquals('2023-12-12T10:00:00+00:00', $voucher->getExpirationDate()->format('c'));
        $this->assertEquals('2023-10-19T07:38:37+00:00', $voucher->getRedeemedAt()->format('c'));
        $this->assertTrue($voucher->isRedeemed());
        $this->assertEquals('89da4cc4-1d51-4041-b829-6225fcdef11d', $voucher->getPromotion()->getUuid());
        $this->assertEquals('123', $voucher->getContact()->getUuid());
    }

    /** @test
     * @throws PiggyRequestException
     */
    public function it_can_redeem_a_voucher_that_is_locked_by_supplying_a_release_key()
    {
        $this->addExpectedResponse(
            [
                'uuid' => 'c5d33f23-7f59-491f-9043-5805d58d98c1',
                'code' => 'VTXAKWYDT',
                'status' => 'REDEEMED',
                'name' => 'Gratis Pizza',
                'description' => 'Lekker gratis pizza',
                'activation_date' => '2023-12-10T10:00:00+00:00',
                'expiration_date' => '2023-12-12T10:00:00+00:00',
                'redeemed_at' => '2023-10-19T07:38:37+00:00',
                'is_redeemed' => true,
                'promotion' => [
                    'uuid' => '89da4cc4-1d51-4041-b829-6225fcdef11d',
                    'name' => 'Gratis Pizza',
                    'description' => 'Lekker gratis pizza',
                    'type' => 'SINGLE_USE',
                    'redemptions_per_voucher' => 1,
                ],
                'contact' => [
                    'uuid' => '123',
                ],
            ]
        );

        $voucher = $this->mockedClient->voucher->redeem('VTESCW2CT', '123', '21bcfee5-e8ee-4a66-a8e8-9b9550fdea9a');

        $this->assertEquals('c5d33f23-7f59-491f-9043-5805d58d98c1', $voucher->getUuid());
        $this->assertEquals('VTXAKWYDT', $voucher->getCode());
        $this->assertEquals('REDEEMED', $voucher->getStatus());
        $this->assertEquals('Gratis Pizza', $voucher->getPromotion()->getName());
        $this->assertEquals('Lekker gratis pizza', $voucher->getPromotion()->getDescription());
        $this->assertEquals('2023-12-10T10:00:00+00:00', $voucher->getActivationDate()->format('c'));
        $this->assertEquals('2023-12-12T10:00:00+00:00', $voucher->getExpirationDate()->format('c'));
        $this->assertEquals('2023-10-19T07:38:37+00:00', $voucher->getRedeemedAt()->format('c'));
        $this->assertTrue($voucher->isRedeemed());
        $this->assertEquals('89da4cc4-1d51-4041-b829-6225fcdef11d', $voucher->getPromotion()->getUuid());
        $this->assertEquals('123', $voucher->getContact()->getUuid());
    }

    /** @test
     * @throws PiggyRequestException
     */
    public function a_contact_cannot_redeem_a_voucher_that_is_already_linked_to_another_contact()
    {
        $this->addExpectedResponse(
            [
                'uuid' => 'bbe97f73-f482-4dff-bbb3-cba6d63e139b',
                'code' => 'EXAMPLE-CODE-123456',
                'status' => 'REDEEMED',
                'name' => 'Gratis Pizza',
                'description' => 'Lekker gratis pizza',
                'activation_date' => '2023-12-10T10:00:00+00:00',
                'expiration_date' => '2023-12-12T10:00:00+00:00',
                'redeemed_at' => '2023-10-19T07:38:37+00:00',
                'is_redeemed' => true,
                'promotion' => [
                    'uuid' => '89da4cc4-1d51-4041-b829-6225fcdef11d',
                    'name' => 'Gratis Pizza',
                    'description' => 'Lekker gratis pizza',
                    'type' => 'SINGLE_USE',
                    'redemptions_per_voucher' => 1,
                ],
                'contact' => [
                    'uuid' => '456',
                ],
            ]
        );

        $voucher = $this->mockedClient->voucher->redeem('EXAMPLE-CODE-123456', '123');

        $this->assertEquals('bbe97f73-f482-4dff-bbb3-cba6d63e139b', $voucher->getUuid());
        $this->assertEquals('EXAMPLE-CODE-123456', $voucher->getCode());
        $this->assertEquals('REDEEMED', $voucher->getStatus());
        $this->assertEquals('Gratis Pizza', $voucher->getPromotion()->getName());
        $this->assertEquals('Lekker gratis pizza', $voucher->getPromotion()->getDescription());
        $this->assertEquals('2023-12-10T10:00:00+00:00', $voucher->getActivationDate()->format('c'));
        $this->assertEquals('2023-12-12T10:00:00+00:00', $voucher->getExpirationDate()->format('c'));
        $this->assertEquals('2023-10-19T07:38:37+00:00', $voucher->getRedeemedAt()->format('c'));
        $this->assertTrue($voucher->isRedeemed());
        $this->assertEquals('89da4cc4-1d51-4041-b829-6225fcdef11d', $voucher->getPromotion()->getUuid());
        $this->assertEquals('456', $voucher->getContact()->getUuid());
    }

    /** @test
     * @throws PiggyRequestException
     */
    public function it_can_lock_a_voucher()
    {
        $this->addExpectedResponse(
            [
                'voucher' => [
                    'uuid' => 'bbe97f73-f482-4dff-bbb3-cba6d63e139b',
                    'status' => 'LOCKED',
                ],
                'lock' => [
                    'release_key' => '01e7c31d-8fb7-4f3c-9020-c9e3782e2c0d',
                    'locked_at' => '2023-10-19T08:08:51+00:00',
                    'unlocked_at' => null,
                    'system_release_at' => '2023-10-19T09:08:51+00:00',
                ],
            ]
        );

        $voucherDTO = $this->mockedClient->voucher->lock('bbe97f73-f482-4dff-bbb3-cba6d63e139b');

        $this->assertEquals('bbe97f73-f482-4dff-bbb3-cba6d63e139b', $voucherDTO->getVoucher()->getUuid());
        $this->assertEquals('LOCKED', $voucherDTO->getVoucher()->getStatus());

        $this->assertEquals('01e7c31d-8fb7-4f3c-9020-c9e3782e2c0d', $voucherDTO->getLock()->getReleaseKey());
        $this->assertEquals('2023-10-19T08:08:51+00:00', $voucherDTO->getLock()->getLockedAt()->format('c'));
        $this->assertEquals('2023-10-19T09:08:51+00:00', $voucherDTO->getLock()->getSystemReleaseAt()->format('c'));
    }

    /** @test
     * @throws PiggyRequestException
     */
    public function it_can_release_a_voucher()
    {
        $this->addExpectedResponse(
            [
                'voucher' => [
                    'uuid' => 'bbe97f73-f482-4dff-bbb3-cba6d63e139b',
                    'status' => 'ACTIVE',
                ],
                'lock' => [
                    'release_key' => '6fa81816-fff5-4320-b499-1469f036e4d1',
                    'locked_at' => '2023-10-19T11:11:22+00:00',
                    'unlocked_at' => '2023-10-19T11:11:50+00:00',
                    'system_release_at' => null,
                ],
            ]
        );

        $voucherDTO = $this->mockedClient->voucher->lock('bbe97f73-f482-4dff-bbb3-cba6d63e139b');

        $this->assertEquals('bbe97f73-f482-4dff-bbb3-cba6d63e139b', $voucherDTO->getVoucher()->getUuid());
        $this->assertEquals('ACTIVE', $voucherDTO->getVoucher()->getStatus());

        $this->assertEquals('6fa81816-fff5-4320-b499-1469f036e4d1', $voucherDTO->getLock()->getReleaseKey());
        $this->assertEquals('2023-10-19T11:11:22+00:00', $voucherDTO->getLock()->getLockedAt()->format('c'));
        $this->assertEquals('2023-10-19T11:11:50+00:00', $voucherDTO->getLock()->getUnlockedAt()->format('c'));
    }
}
