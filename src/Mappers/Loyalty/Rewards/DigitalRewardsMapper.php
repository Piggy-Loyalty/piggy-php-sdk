<?php

namespace Piggy\Api\Mappers\Loyalty\Rewards;

/**
 * Class DigitalRewardsMapper
 * @package Piggy\Api\Mappers\Loyalty
 */
class DigitalRewardsMapper
{
    /**
     * @param array $rewards
     * @return array
     */
    public function map(array $rewards): array
    {
        $digitalRewardMapper = new DigitalRewardMapper();

        $digitalRewards = [];
        foreach ($rewards as $item) {
            $digitalRewards[] = $digitalRewardMapper->map($item);
        }

        return $digitalRewards;
    }
}
