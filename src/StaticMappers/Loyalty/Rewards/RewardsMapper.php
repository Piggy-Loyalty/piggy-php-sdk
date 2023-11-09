<?php

namespace Piggy\Api\StaticMappers\Loyalty\Rewards;

use Exception;

/**
 * Class RewardsMapper
 * @package Piggy\Api\Mappers\Loyalty\Rewards
 */
class RewardsMapper
{
    /**
     * @param $data
     * @return array
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
