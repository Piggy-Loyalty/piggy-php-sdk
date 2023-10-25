<?php

namespace Piggy\Api\Mappers\Loyalty\Rewards;

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
    public function map($data): DigitalRewardCode
    {
        return new DigitalRewardCode(
            $data->code
        );
    }
}