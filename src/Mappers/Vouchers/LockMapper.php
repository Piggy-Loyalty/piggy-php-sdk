<?php

namespace Piggy\Api\Mappers\Vouchers;

use Piggy\Api\Mappers\BaseMapper;
use Piggy\Api\Models\Vouchers\Lock;

/**
 * Class LockMapper
 * @package Piggy\Api\Mappers\Lock
 */
class LockMapper extends BaseMapper
{
    /**
     * @param $data
     * @return Lock
     */
    public function map($data): Lock
    {
        return new Lock(
            $data->release_key,
            $this->parseDate($data->locked_at),
            isset($data->unlocked_at) ? $this->parseDate($data->unlocked_at) : null,
            isset($data->system_release_at) ? $this->parseDate($data->system_release_at) : null
        );
    }
}

