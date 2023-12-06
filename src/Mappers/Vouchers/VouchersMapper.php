<?php

namespace Piggy\Api\Mappers\Vouchers;

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