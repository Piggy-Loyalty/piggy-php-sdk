<?php

namespace Piggy\Api\Mappers\Vouchers;

use Piggy\Api\Models\Vouchers\Lock;

/**
 * Class LockMapper
 * @package Piggy\Api\Mappers\Lock
 */
class LockMapper
{
    /**
     * @param $data
     * @return Lock
     */
    public function map($data): Lock
    {
        return new Lock(
            $data->release_key,
            $data->locked_at,
            $data->unlocked_at,
            $data->system_release_at
        );
    }
}

