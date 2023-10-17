<?php

namespace Piggy\Api\Mappers\Vouchers;

use Piggy\Api\Models\Vouchers\Promotion;

/**
 * Class ShopMapper
 * @package Piggy\Api\Mappers\Promotion
 */
class PromotionMapper
{
    /**
     * @param $data
     * @return Promotion
     */
    public function map($data): Promotion
    {
        return new Promotion(
            $data->uuid,
            $data->name,
            $data->description,
            $data->voucher_limit ?? null,
            $data->limit_per_contact ?? null,
            $data->expiration_duration ?? null
        );
    }
}
