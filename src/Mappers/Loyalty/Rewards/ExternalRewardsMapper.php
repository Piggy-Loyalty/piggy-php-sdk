<?php

namespace Piggy\Api\Mappers\Loyalty\Rewards;

/**
 * Class ExternalRewardsMapper
 * @package Piggy\Api\Mappers\Loyalty\Rewards
 */
class ExternalRewardsMapper
{
    /**
     * @param array $rewards
     * @return array
     */
    public function map(array $rewards): array
    {
        $externalRewardMapper = new ExternalRewardMapper();

        $externalRewards = [];
        foreach ($rewards as $item) {
            $externalRewards[] = $externalRewardMapper->map($item);
        }

        return $externalRewards;
    }
}
