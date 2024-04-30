<?php

namespace Piggy\Api\StaticMappers\Loyalty\Rewards;

use Exception;

/**
 * Class RewardsMapper
 */
class RewardsMapper
{
    /**
     * @throws Exception
     */
    public static function map($data): array
    {
        $rewards = [];
        foreach ($data as $rewardData) {
            $rewards[] = RewardMapper::map($rewardData);
        }

        return $rewards;
    }
}
