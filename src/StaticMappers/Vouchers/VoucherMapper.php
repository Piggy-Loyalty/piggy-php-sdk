<?php

namespace Piggy\Api\StaticMappers\Vouchers;

use Piggy\Api\Model;
use Piggy\Api\StaticMappers\BaseMapper;
use Piggy\Api\StaticMappers\Contacts\ContactMapper;
use Piggy\Api\Models\Vouchers\Voucher;

/**
 * Class VoucherMapper
 * @package Piggy\Api\Mappers\Vouchers
 */
class VoucherMapper extends BaseMapper
{
    /**
     * @param $data
     * @return Model
     */
    public static function map($data): Model
    {
        if (isset($data->promotion)) {
            $promotion = PromotionMapper::map($data->promotion);
        }

        if (isset($data->contact)) {
            $contact = ContactMapper::map($data->contact);
        }

        return new Model(
            $data->uuid,
            $data->status,
            $data->code ?? null,
            $data->name ?? null,
            $data->description ?? null,
            $promotion ?? null,
            $contact ?? null,
            isset($data->redeemed_at) ? self::parseDate($data->redeemed_at) : null,
            $data->is_redeemed ?? null,
            isset($data->activation_date) ? self::parseDate($data->activation_date) : null,
            isset($data->expiration_date) ? self::parseDate($data->expiration_date) : null
        );
    }
}
