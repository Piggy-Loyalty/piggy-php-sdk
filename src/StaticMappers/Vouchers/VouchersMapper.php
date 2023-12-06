<?php

namespace Piggy\Api\StaticMappers\Vouchers;

/**
 * Class PromotionsMapper
 * @package Piggy\Api\Mappers\Vouchers
 */
class VouchersMapper
{
    /**
     * @param $data
     * @return array
     */
    public static function map($data): array
    {
        $vouchers = [];

        foreach ($data as $item) {
            $vouchers[] = VoucherMapper::map($item);
        }

        return $vouchers;
    }
}