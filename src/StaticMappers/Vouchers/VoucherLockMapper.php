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
    public function map($data): VoucherLock
    {
        $voucherMapper = new VoucherMapper();
        $voucher = $voucherMapper->map($data->voucher);

        $lockMapper = new LockMapper();
        $lock = $lockMapper->map($data->lock);

        return new VoucherLock(
            $voucher,
            $lock
        );
    }
}
