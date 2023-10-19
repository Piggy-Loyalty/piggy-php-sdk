<?php

namespace Piggy\Api\Mappers\Vouchers;

use Piggy\Api\Models\Vouchers\VoucherLockDTO;

/**
 * Class ShopMapper
 * @package Piggy\Api\Mappers\Promotion
 */
class VoucherLockDTOMapper
{
    /**
     * @param $data
     * @return VoucherLockDTO
     */
    public function map($data): VoucherLockDTO
    {
        $voucherMapper = new VoucherMapper();
        $voucher = $voucherMapper->map($data->voucher);

        $lockMapper = new LockMapper();
        $lock = $lockMapper->map($data->lock);

        return new VoucherLockDTO(
            $voucher,
            $lock
        );
    }
}
