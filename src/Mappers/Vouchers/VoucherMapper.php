<?php

namespace Piggy\Api\Mappers\Vouchers;

use Piggy\Api\Mappers\Contacts\ContactMapper;
use Piggy\Api\Models\Vouchers\Voucher;

/**
 * Class ShopMapper
 * @package Piggy\Api\Mappers\Promotion
 */
class VoucherMapper
{
    /**
     * @param $data
     * @return Voucher
     */
    public function map($data): Voucher
    {
        if(isset($data->promotion)){
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
            $data->redeemed_at ?? null,
            $data->is_redeemed ?? null,
            $data->activation_date ?? null,
            $data->expiration_date ?? null
        );
    }
}
