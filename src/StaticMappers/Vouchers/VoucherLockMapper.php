<?php

namespace Piggy\Api\StaticMappers\Vouchers;

use Piggy\Api\Models\Vouchers\VoucherLock;

/**
 * Class VoucherLockMapper
 * @package Piggy\Api\Mappers\Vouchers
 */
class VoucherLockMapper
{
    /**
     * @param $data
     * @return VoucherLock
     */
    public static function map($data): VoucherLock
    {
        $voucher = VoucherMapper::map($data->voucher);
        $lock = LockMapper::map($data->lock);

        return new VoucherLock(
            $voucher,
            $lock
        );
    }
}
