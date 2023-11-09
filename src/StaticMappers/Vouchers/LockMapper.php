<?php

namespace Piggy\Api\StaticMappers\Vouchers;

use Piggy\Api\StaticMappers\BaseMapper;
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
    public static function map($data): Lock
    {
        return new Lock(
            $data->release_key,
            self::parseDate($data->locked_at),
            isset($data->unlocked_at) ? self::parseDate($data->unlocked_at) : null,
            isset($data->system_release_at) ? self::parseDate($data->system_release_at) : null
        );
    }
}

