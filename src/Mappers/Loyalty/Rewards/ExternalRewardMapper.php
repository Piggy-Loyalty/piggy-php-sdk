<?php

namespace Piggy\Api\Mappers\Loyalty\Rewards;

use Piggy\Api\Models\Loyalty\Rewards\ExternalReward;

/**
 * Class ExternalRewardMapper
 * @package Piggy\Api\Mappers\Loyalty\Rewards
 */
class ExternalRewardMapper
{
    /**
     * @param object $reward
     * @return ExternalReward
     */
    public function map(object $reward): ExternalReward
    {
        $requiredCredits = property_exists($reward, "required_credits") ? $reward->required_credits : null;
        $price = property_exists($reward, "price") ? $reward->price : null;
        $active = property_exists($reward, 'active') ? $reward->active : true;
        $stock = property_exists($reward, 'stock') ? $reward->stock : null;

        return new ExternalReward(
            $reward->id,
            $reward->title,
            $price,
            $active,
            $requiredCredits,
            $stock
        );
    }
}
