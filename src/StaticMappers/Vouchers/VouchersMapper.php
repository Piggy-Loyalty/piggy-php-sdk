<?php

namespace Piggy\Api\StaticMappers\Vouchers;

/**
 * Class PromotionsMapper
 */
class VouchersMapper
{
    public static function map($data): array
    {
        $vouchers = [];

        foreach ($data as $item) {
            $vouchers[] = VoucherMapper::map($item);
        }

        return $vouchers;
    }
}
