<?php

namespace Piggy\Api\Resources\OAuth\Vouchers;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Vouchers\VoucherLockMapper;
use Piggy\Api\Mappers\Vouchers\VoucherMapper;
use Piggy\Api\Mappers\Vouchers\VouchersMapper;
use Piggy\Api\Models\Vouchers\Voucher;
use Piggy\Api\Models\Vouchers\VoucherLock;
use Piggy\Api\Resources\BaseResource;
use DateTime;

/**
 * Class VoucherResource
 * @package Piggy\Api\Resources\OAuth\Vouchers
 */
class VouchersResource extends BaseResource
{
    /**
     * @var string
     */
    protected $resourceUri = "/api/v3/oauth/clients/vouchers";

    /**
     * @param string $promotionUuid
     * @param string|null $code
     * @param string|null $contactUuid
     * @param DateTime|null $activationDate
     * @param DateTime|null $expirationDate
     * @return Voucher
     * @throws PiggyRequestException
     */
    public function create(string $promotionUuid, ?string $code = null, ?string $contactUuid = null, ?DateTime $activationDate = null, ?DateTime $expirationDate = null): Voucher
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
     * @param string $quantity
     * @param string|null $contactUuid
     * @param DateTime|null $activationDate
     * @param DateTime|null $expirationDate
     * @return string
     * @throws PiggyRequestException
     */
    public function batch(string $promotionUuid, string $quantity, ?string $contactUuid = null, ?DateTime $activationDate = null, ?DateTime $expirationDate = null): string
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
     * @param int $page
     * @param int $limit
     * @return array
     * @throws PiggyRequestException
     */
    public function list(int $page = 1, int $limit = 30, ?string $promotionUuid = null, ?string $contactUuid = null, ?string $status = null): array
    {
        $response = $this->client->get($this->resourceUri, [
            "page" => $page,
            "limit" => $limit,
            "promotion_uuid" => $promotionUuid,
            "contact_uuid" => $contactUuid,
            "status" => $status
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
     * @param string|null $code
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
     * @return VoucherLock
     * @throws PiggyRequestException
     */
    public function lock(string $voucherUuid): VoucherLock
    {
        $response = $this->client->post("$this->resourceUri/$voucherUuid/lock/", []);

        $mapper = new VoucherLockMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param string $voucherUuid
     * @param string $releaseKey
     * @return VoucherLock
     * @throws PiggyRequestException
     */
    public function release(string $voucherUuid, string $releaseKey): VoucherLock
    {
        $response = $this->client->post("$this->resourceUri/$voucherUuid/release/", [
            "release_key" => $releaseKey
        ]);

        $mapper = new VoucherLockMapper();

        return $mapper->map($response->getData());
    }
}