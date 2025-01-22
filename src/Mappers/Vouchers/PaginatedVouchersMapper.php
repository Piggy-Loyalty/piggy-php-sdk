<?php

namespace Piggy\Api\Mappers\Vouchers;

use Piggy\Api\Mappers\BasePaginatedMapper;
use Piggy\Api\Models\Vouchers\Voucher;

class PaginatedVouchersMapper extends BasePaginatedMapper
{
    /**
     * Get the mapped vouchers
     *
     * @return Voucher[]
     */
    public function getData(): array
    {
        $mapper = new VoucherMapper();
        $vouchers = [];

        foreach ($this->data as $item) {
            $vouchers[] = $mapper->map($item);
        }

        return $vouchers;
    }
}
