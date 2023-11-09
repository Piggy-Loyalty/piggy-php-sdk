<?php

namespace Piggy\Api\StaticMappers\Vouchers;

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
     * @return Voucher
     */
    public function map($data): Voucher
    {
        if (isset($data->promotion)) {
            $promotionMapper = new PromotionMapper();
            $promotion = $promotionMapper->map($data->promotion);
        }

        if (isset($data->contact)) {
            $contactMapper = new ContactMapper();
            $contact = $contactMapper->map($data->contact);
        }

        return new Voucher(
            $data->uuid,
            $data->status,
            $data->code ?? null,
            $data->name ?? null,
            $data->description ?? null,
            $promotion ?? null,
            $contact ?? null,
            isset($data->redeemed_at) ? $this->parseDate($data->redeemed_at) : null,
            $data->is_redeemed ?? null,
            isset($data->activation_date) ? $this->parseDate($data->activation_date) : null,
            isset($data->expiration_date) ? $this->parseDate($data->expiration_date) : null
        );
    }
}
