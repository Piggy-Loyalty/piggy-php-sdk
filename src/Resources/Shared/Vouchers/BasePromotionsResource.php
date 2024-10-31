<?php

namespace Piggy\Api\Resources\Shared\Vouchers;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Vouchers\PromotionMapper;
use Piggy\Api\Mappers\Vouchers\PromotionsMapper;
use Piggy\Api\Models\Vouchers\Promotion;
use Piggy\Api\Resources\BaseResource;

abstract class BasePromotionsResource extends BaseResource
{
    /**
     * @return Promotion[]
     *
     * @throws PiggyRequestException
     */
    public function list(int $page = 1, int $limit = 30): array
    {
        $response = $this->client->get($this->resourceUri, [
            'page' => $page,
            'limit' => $limit,
        ]);

        $mapper = new PromotionsMapper();

        return $mapper->map((array) $response->getData());
    }

    public function create(string $name, string $description, ?string $type = null, ?int $redemptionsPerVoucher = null, ?int $voucherLimit = null, ?int $limitPerContact = null, ?int $expirationDuration = null): Promotion
    {
        $response = $this->client->post($this->resourceUri, [
            'name' => $name,
            'description' => $description,
            'type' => $type,
            'redemptions_per_voucher' => $redemptionsPerVoucher,
            'voucher_limit' => $voucherLimit,
            'limit_per_contact' => $limitPerContact,
            'expiration_duration' => $expirationDuration
        ]);

        $mapper = new PromotionMapper();

        return $mapper->map($response->getData());
    }

    public function findBy(string $promotionUuid): Promotion
    {
        $response = $this->client->get("$this->resourceUri/$promotionUuid");

        $mapper = new PromotionMapper();

        return $mapper->map($response->getData());
    }
}
