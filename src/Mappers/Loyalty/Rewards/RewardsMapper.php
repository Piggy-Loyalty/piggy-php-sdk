<?php

namespace Piggy\Api\Mappers\Loyalty\Rewards;

/**
 * Class RewardsMapper
 * @package Piggy\Api\Mappers\Loyalty\Rewards
 */
class RewardsMapper
{
    /**
     * @param $data
     * @return array
     * @throws \Exception
     */
    public function map($data): array
    {
        $mapper = new RewardMapper();

        $rewards = [];
        foreach ($data as $rewardData) {
            $rewards[] = $mapper->map($rewardData);
        }

        return $rewards;
    }
}
