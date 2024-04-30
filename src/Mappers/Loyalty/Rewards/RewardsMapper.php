<?php

namespace Piggy\Api\Mappers\Loyalty\Rewards;

use Exception;

/**
 * Class RewardsMapper
 */
class RewardsMapper
{
    /**
     * @throws Exception
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
