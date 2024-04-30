<?php

namespace Piggy\Api\Mappers\Vouchers;

use Piggy\Api\Models\Vouchers\Promotion;
use stdClass;

/**
 * Class PromotionMapper
 */
class PromotionMapper
{
    public function map(stdClass $data): Promotion
    {
        return new Promotion(
            $data->uuid,
            $data->name,
            $data->description,
            $data->voucher_limit ?? null,
            $data->limit_per_contact ?? null,
            $data->expiration_duration ?? null,
            is_object($data->attributes) ? get_object_vars($data->attributes) : []
        );
    }
}
