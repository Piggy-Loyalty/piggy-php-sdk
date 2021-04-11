<?php

namespace Piggy\Api\Mappers\Loyalty\Rewards;

use Piggy\Api\Models\Loyalty\Rewards\PhysicalReward;

/**
 * Class PhysicalRewardMapper
 * @package Piggy\Api\Mappers\Loyalty\Rewards
 */
class PhysicalRewardMapper
{
    /**
     * @param object $data
     * @return PhysicalReward
     */
    public function map(object $data): PhysicalReward
    {
        $active = property_exists($data, 'active') ? $data->active : true;
        $requiredCredits = property_exists($data, 'required_credits') ? $data->required_credits : null;

        return new PhysicalReward(
            $data->id,
            $data->title,
            $active,
            $requiredCredits
        );
    }
}
