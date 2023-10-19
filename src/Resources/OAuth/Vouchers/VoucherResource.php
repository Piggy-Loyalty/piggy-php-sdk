<?php

namespace Piggy\Api\Resources\OAuth\Vouchers;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Vouchers\VoucherLockDTOMapper;
use Piggy\Api\Mappers\Vouchers\VoucherMapper;
use Piggy\Api\Mappers\Vouchers\VouchersMapper;
use Piggy\Api\Models\Vouchers\Voucher;
use Piggy\Api\Models\Vouchers\VoucherLockDTO;
use Piggy\Api\Resources\BaseResource;

/**
 * Class GiftcardProgramResource
 * @package Piggy\Api\Resources\OAuth
 */
class VoucherResource extends BaseResource
{
    /**
     * @var string
     */
    protected $resourceUri = "/api/v3/oauth/clients/vouchers";

    /**
     * @param string $promotionUuid
     * @param string|null $code
     * @param string|null $contactUuid
     * @param string|null $activationDate
     * @param string|null $expirationDate
     * @return Voucher
     * @throws PiggyRequestException
     */
    public function create(string $promotionUuid, ?string $code = null, ?string $contactUuid = null, ?string $activationDate = null, ?string $expirationDate = null): Voucher
    {
        $response = $this->client->post($this->resourceUri, [
            "promotion_uuid" => $promotionUuid,
            "code" => $code,
            "contact_uuid" => $contactUuid,
            "activation_date" => $activationDate,
            "expiration_date" => $expirationDate
        ]);

        $mapper = new VoucherMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param string $promotionUuid
     * @param string|null $code
     * @param string|null $contactUuid
     * @param string|null $activationDate
     * @param string|null $expirationDate
     * @return Voucher
     * @throws PiggyRequestException
     */
    public function batch(string $promotionUuid, string $quantity, ?string $contactUuid = null, ?string $activationDate = null, ?string $expirationDate = null): string
    {
        $this->client->post($this->resourceUri, [
            "promotion_uuid" => $promotionUuid,
            "quantity" => $quantity,
            "contact_uuid" => $contactUuid,
            "activation_date" => $activationDate,
            "expiration_date" => $expirationDate
        ]);

        return "Voucher generation successfully started in background.";
    }

    /**
     * @return array
     * @throws PiggyRequestException
     */
    public function list(int $page = 1, int $limit = 30): array
    {
        $response = $this->client->get($this->resourceUri, [
            "page" => $page,
            "limit" => $limit,
        ]);

        $mapper = new VouchersMapper();

        return $mapper->map((array)$response->getData());
    }

    /**
     * @param string $code
     * @return Voucher
     * @throws PiggyRequestException
     */
    public function findByCode(string $code): Voucher
    {
        $response = $this->client->get("$this->resourceUri/find", [
            "code" => $code,
        ]);

        $mapper = new VoucherMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param string $code
     * @param string|null $contactUuid
     * @param string|null $releaseKey

     * @return Voucher
     * @throws PiggyRequestException
     */
    public function redeem(string $code = null, ?string $contactUuid = null, ?string $releaseKey = null): Voucher
    {
        $response = $this->client->post("$this->resourceUri/redeem", [
            "code" => $code,
            "contact_uuid" => $contactUuid,
            "release_key" => $releaseKey
        ]);

        $mapper = new VoucherMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param string $voucherUuid
     * @return VoucherLockDTO
     * @throws PiggyRequestException
     */
    public function lock(string $voucherUuid): VoucherLockDTO
    {
        $response = $this->client->post("$this->resourceUri/$voucherUuid/lock/", []);

        $mapper = new VoucherLockDTOMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param string $voucherUuid
     * @return VoucherLockDTO
     * @throws PiggyRequestException
     */
    public function release(string $voucherUuid, string $releaseKey): VoucherLockDTO
    {
        $response = $this->client->post("$this->resourceUri/$voucherUuid/release/", [
            "release_key" => $releaseKey
        ]);

        $mapper = new VoucherLockDTOMapper();

        return $mapper->map($response->getData());
    }




//    /**
//     * @param string $code
//     * @return Voucher
//     * @throws PiggyRequestException
//     */
//    public function findByCode(string $code): Voucher
//    {
//        $response = $this->client->get($this->resourceUri, [
//            "code" => $code,
//        ]);
//
//        $mapper = new VoucherMapper();
//
//        return $mapper->map($response->getData());
//    }
}