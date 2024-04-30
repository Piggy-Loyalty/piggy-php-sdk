<?php

namespace Piggy\Api\Models\Vouchers;

class VoucherLock
{
    protected $voucher;

    protected $lock;

    public function __construct(Voucher $voucher, Lock $lock)
    {
        $this->voucher = $voucher;
        $this->lock = $lock;
    }

    public function getVoucher(): Voucher
    {
        return $this->voucher;
    }

    public function getLock(): Lock
    {
        return $this->lock;
    }
}
