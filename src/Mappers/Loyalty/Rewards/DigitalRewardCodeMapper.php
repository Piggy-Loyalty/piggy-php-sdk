<?php

namespace Piggy\Api\Mappers\Loyalty\Rewards;

use Piggy\Api\Models\Loyalty\Rewards\DigitalRewardCode;

/**
 * Class DigitalRewardMapper
 * @package Piggy\Api\Mappers\Shops
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