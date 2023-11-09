<?php

namespace Piggy\Api\StaticMappers\Loyalty\Rewards;

use Exception;

/**
 * Class CollectableRewardsMapper
 * @package Piggy\Api\Mappers\CollectableRewards
 */
class CollectableRewardsMapper
{
    /**
     * @param $data
     * @return array
     * @throws Exception
     */
    public static function map($data): array
    {
        $collectableRewards = [];
        foreach ($data as $item) {
            $collectableRewards[] = CollectableRewardMapper::map($item);
        }
        return $collectableRewards;
    }
}
