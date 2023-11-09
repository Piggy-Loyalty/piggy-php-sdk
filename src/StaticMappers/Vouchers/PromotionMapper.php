<?php

namespace Piggy\Api\StaticMappers\Vouchers;

use Piggy\Api\Models\Vouchers\Promotion;

/**
 * Class PromotionMapper
 * @package Piggy\Api\Mappers\Voucher
 */
class PromotionMapper
{
    /**
     * @param $data
     * @return Promotion
     */
    public static function map($data): Promotion
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
