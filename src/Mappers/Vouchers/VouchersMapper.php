<?php

namespace Piggy\Api\Mappers\Vouchers;

/**
 * Class PromotionsMapper
 */
class VouchersMapper
{
    public function map($data): array
    {
        $mapper = new VoucherMapper();

        $vouchers = [];

        foreach ($data as $item) {
            $vouchers[] = $mapper->map($item);
        }

        return $vouchers;
    }
}
