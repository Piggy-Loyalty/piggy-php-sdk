<?php

namespace Piggy\Api\Mappers\Loyalty\Rewards;

use Piggy\Api\Models\Loyalty\Rewards\DigitalRewardCode;

/**
 * Class DigitalRewardCodeMapper
 */
class DigitalRewardCodeMapper
{
    public function map($data): DigitalRewardCode
    {
        return new DigitalRewardCode(
            $data->code
        );
    }
}
