<?php

namespace Piggy\Api\StaticMappers\Loyalty\Rewards;

use Piggy\Api\Models\Loyalty\Rewards\DigitalRewardCode;

/**
 * Class DigitalRewardCodeMapper
 * @package Piggy\Api\Mappers\Loyalty\Rewards
 */
class DigitalRewardCodeMapper
{
    /**
     * @param $data
     * @return DigitalRewardCode
     */
    public static function map($data): DigitalRewardCode
    {
        return new DigitalRewardCode(
            $data->code
        );
    }
}