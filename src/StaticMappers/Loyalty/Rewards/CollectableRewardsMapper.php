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
    public function map($data): array
    {
        $mapper = new CollectableRewardMapper();

        $collectableRewards = [];
        foreach ($data as $item) {
            $collectableRewards[] = $mapper->map($item);
        }
        return $collectableRewards;
    }
}
