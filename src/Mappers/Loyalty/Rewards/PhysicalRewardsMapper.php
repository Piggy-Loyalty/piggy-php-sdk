<?php

namespace Piggy\Api\Mappers\Loyalty\Rewards;

/**
 * Class PhysicalRewardsMapper
 * @package Piggy\Api\Mappers\Loyalty\Rewards
 */
class PhysicalRewardsMapper
{
    /**
     * @param array $rewards
     * @return array
     */
    public function map(array $rewards): array
    {
        $physicalRewardMapper = new PhysicalRewardMapper();

        $physicalRewards = [];
        foreach ($rewards as $item) {
            $physicalRewards[] = $physicalRewardMapper->map($item);
        }

        return $physicalRewards;
    }
}
