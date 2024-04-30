<?php

namespace Piggy\Api\Mappers\Vouchers;

use Piggy\Api\Models\Vouchers\VoucherLock;

/**
 * Class VoucherLockMapper
 */
class VoucherLockMapper
{
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
