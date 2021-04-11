<?php

namespace Piggy\Api\Mappers\Loyalty\Rewards;

use Piggy\Api\Models\Loyalty\Rewards\DigitalReward;

/**
 * Class DigitalRewardMapper
 * @package Piggy\Api\Mappers\Shops
 */
class DigitalRewardMapper
{
    /**
     * @param object $data
     * @return DigitalReward
     */
    public function map(object $data): DigitalReward
    {
        $requiredCredits = property_exists($data, "required_credits") ? $data->required_credits : null;
        $meta = property_exists($data, "meta") ? $data->meta : null;

        return new DigitalReward(
            $data->id,
            $data->title
        );
    }
}
