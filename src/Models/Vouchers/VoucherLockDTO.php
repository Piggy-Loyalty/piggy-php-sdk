<?php

namespace Piggy\Api\Models\Vouchers;

class VoucherLockDTO
{
    protected $voucher;

    protected $lock;

    public function __construct(Voucher $voucher, Lock $lock)
    {
        $this->voucher = $voucher;
        $this->lock = $lock;
    }

    /**
     * @return Voucher
     */
    public function getVoucher(): Voucher
    {
        return $this->voucher;
    }

    /**
     * @return Lock
     */
    public function getLock(): Lock
    {
        return $this->lock;
    }
}